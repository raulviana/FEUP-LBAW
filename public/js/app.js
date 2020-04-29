/* GET BUTTONS */

const addPostBtn = document.querySelector("div#new-post button");

const passwordField = document.getElementById('password');
const confirmPasswordField = document.getElementById('confirm-password');

const likeBtn = document.querySelector("a#up-vote");
const dislikeBtn  =document.querySelector("a#down-vote");

const delEventBtn = document.querySelector("button#del-event");


function addEventListeners() {
  let userDeleters = document.querySelectorAll("div#manage-users button#delete-user-btn");
  [].forEach.call(userDeleters, function(deleter) {
    deleter.addEventListener('click', sendDeleteUserRequest);
  });

  let userRestorers = document.querySelectorAll("div#manage-users button#restore-user-btn");
  [].forEach.call(userRestorers, function(restorer) {
    restorer.addEventListener('click', sendRestoreUserRequest);
  });

  let collaboratorDeleters = document.querySelectorAll("a#remove-collaborator");
  [].forEach.call(collaboratorDeleters, function(collabdeleter) {
    collabdeleter.addEventListener('click', sendRemoveCollaborator);
  });


  if(addPostBtn){
    addPostBtn.addEventListener('click', sendCreatePostRequest);
  }

  if(likeBtn){
    likeBtn.addEventListener('click', sendLikeVoteRequest);
  }

  if(dislikeBtn){
    dislikeBtn.addEventListener('click', sendDislikeVoteRequest);
  }

  if(delEventBtn){
    delEventBtn.addEventListener('click', sendDeleteEventRequest);
  }
}

function validatePassword(){ 
  if(passwordField.value != confirmPasswordField.value) {
    confirmPasswordField.setCustomValidity("Passwords don't match");
  } else {
    confirmPasswordField.setCustomValidity('');
  }
}

function encodeForAjax(data) {
  if (data == null) return null;
  return Object.keys(data).map(function(k){
    return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
  }).join('&');
}

function sendAjaxRequest(method, url, data, handler) {
  let request = new XMLHttpRequest();

  request.open(method, url, true);
  request.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);
  request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  request.addEventListener('load', handler);
  request.send(encodeForAjax(data));
}
/* SENDERS */

function sendRemoveCollaborator(event){
  event.preventDefault();
  let user_id = this.closest('a').getAttribute('data-id');
  let event_id = this.closest('tbody').getAttribute('data-id');


  sendAjaxRequest("delete", `/api/events/${event_id}/remove/${user_id}`, {event_id: event_id, user_id: user_id}, collaboratorRemovedHandler);
}

function sendLikeVoteRequest(event){
  event.preventDefault();
  let event_id = this.closest('a').getAttribute('data-id');
  
  sendAjaxRequest("put", `/api/events/${event_id}/up`, {event_id: event_id}, reviewEventHandler);
}

function sendDislikeVoteRequest(event){
  event.preventDefault();
  let event_id = this.closest('a').getAttribute('data-id');


  sendAjaxRequest("put", `/api/events/${event_id}/down`, {event_id: event_id}, reviewEventHandler);
}


function sendDeleteUserRequest(event) { 
  event.preventDefault();
 
  let id = this.closest('button').getAttribute('data-id');

  sendAjaxRequest("delete", `/api/users/${id}/delete`, {id:id}, userDeletedHandler);
}

function sendRestoreUserRequest(event){
  event.preventDefault();
 
  let id = this.closest('button').getAttribute('data-id');

  sendAjaxRequest("post", `/api/users/${id}/restore`, {id:id}, userRestoreHandler);
}

function sendCreatePostRequest(event){
  event.preventDefault();

  let eventid = this.closest('button').getAttribute('data-event-id');
  let userid = this.closest('button').getAttribute('data-user-id');
  let content = document.querySelector('div#new-post textarea').value;


  sendAjaxRequest("put", `/api/events/${eventid}/posts/create`, {eventid: eventid, userid: userid, content: content}, postCreatedHandler);

}

function sendDeleteEventRequest(event){
  event.preventDefault();
  
  let id = this.closest('button').getAttribute('data-id');

  sendAjaxRequest("delete", `/api/events/${id}/delete`, {id: id}, eventDeletedHandler);
}
/*--------*/

/* HANDLERS */

function collaboratorRemovedHandler(){
  let row = JSON.parse(this.responseText);
  let event_id = row['event_id'];
  let user_id = row.user_id;

  if(this.status != 200) window.location = `/events/${event_id}`;

  let tabelRow = document.querySelector('tr[data-id="' + user_id +'"]');
  tabelRow.remove();  
}

function eventDeletedHandler(){
  window.location = '/';
}

function reviewEventHandler(){
  let review = JSON.parse(this.responseText);

  let review_score = document.querySelector("p#event-reviews");
  review_score.textContent = review['review'];
}

function postCreatedHandler() {
  //if(this.status != 200) window.location = '/';
  let post = JSON.parse(this.responseText);

  let new_post = document.createElement('article');
  new_post.classList.add('post', 'p-3', 'mb-3');
  new_post.innerHTML = `
    <div class="d-flex flex-row align-items-center">
        <img src="https://pbs.twimg.com/profile_images/973548356462051329/PldBA7ID_400x400.jpg" class="rounded-circle mr-2" alt="Owner" width="50px">
        <h6> <b>${post.user_id}</b> says... </h6>
    </div>
    <p id="comment-body">${post.content}</p>
    <p id="comment-datetime" class="text-right">${post.post_time}</p>
    <hr>
  `;
  
  let posts_list = document.querySelector('div#post-listing article');

  if(posts_list){
    (posts_list.parentElement).insertBefore(new_post, posts_list);
  }
  else{
    let warning = document.querySelector('div#post-listing p');
    warning.remove();

    let posts_list = document.querySelector('div#post-listing');
    posts_list.appendChild(new_post);
  }

  let form_field = document.querySelector('textarea#post-content');
  form_field.value="";
}

function userDeletedHandler() {
  if (this.status != 200) window.location = '/';

  let user = JSON.parse(this.responseText);

  const alert = document.createElement('div');
  alert.classList.add("alert", "alert-success");
  alert.innerText = "User " + user.name + " was suspended.";

  let btn = document.querySelector('button#delete-user-btn[data-id="' + user.id + '"]');
  btn.disabled=true;

  let state = document.querySelector('td[data-id="' + user.id + '"]');
  state.innerHTML="Suspended";

  const manageUserDiv = document.querySelector('div#admin-management');
  (manageUserDiv.parentElement).insertBefore(alert, manageUserDiv);


  setTimeout(() => {
    alert.parentElement.removeChild(alert);
  }, 3000);
}

function userRestoreHandler() {
  if (this.status != 200) window.location = '/';
  
  let user = JSON.parse(this.responseText);

  const alert = document.createElement('div');
  alert.classList.add("alert", "alert-success");
  alert.innerText = "User " + user.name + " was restored.";

  let btn = document.querySelector('button#restore-user-btn[data-id="' + user.id + '"]');
  btn.disabled=true;

  let state = document.querySelector('td[data-id="' + user.id + '"]');
  state.innerHTML="Active";

  const manageUserDiv = document.querySelector('div#admin-management');
  (manageUserDiv.parentElement).insertBefore(alert, manageUserDiv);


  setTimeout(() => {
    alert.parentElement.removeChild(alert);
  }, 3000);
}


addEventListeners();

