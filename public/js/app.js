/* GET BUTTONS */
const addPostBtn = document.querySelector("button#btn-add-post");

const editPostBtn = document.querySelector("button#btn-edit-post");

const savePostBtn = document.querySelector("button#edit-save");

const passwordField = document.getElementById('password');
const confirmPasswordField = document.getElementById('confirm-password');

const likeBtn = document.querySelector("a#up-vote");
const dislikeBtn  =document.querySelector("a#down-vote");

const delEventBtn = document.querySelectorAll("button#delete-event-btn");

const restEventBtn = document.querySelectorAll('button#restore-event-btn');


const addCollaboratorBtn = document.querySelector("button#search-users");

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

  for(let i = 0; i < delEventBtn.length; i++){
    delEventBtn[i].addEventListener('click', sendDeleteEventRequest);
  }

  for(let i = 0; i < restEventBtn.length; i++){
    restEventBtn[i].addEventListener('click', sendRestoreEventRequest);
  }

  if(addPostBtn){
    addPostBtn.addEventListener('click', sendCreatePostRequest);
  }

  if(editPostBtn){
    editPostBtn.addEventListener('click', EditPost)}


  if(savePostBtn){
    savePostBtn.addEventListener('click', sendSavePostRequest);
  }

  if(dislikeBtn){
    dislikeBtn.addEventListener('click', sendDislikeVoteRequest);
  }

  if(likeBtn){
    likeBtn.addEventListener('click', sendLikeVoteRequest);
  }


  if(addCollaboratorBtn){
    addCollaboratorBtn.addEventListener('click', sendAddCollaboratorRequest);
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

function sendAddCollaboratorRequest(event){
  event.preventDefault();
  
  let query = document.querySelector("input#search-users").value;
  let event_id = document.querySelector("button#save-changes-btn").getAttribute('data-event-id');
  
  sendAjaxRequest("put", `/api/events/{event_id}/add/{user_id})`, {query: query, event_id : event_id}, addCollaboratorHandler);
}

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
console.log("deleteID: " + id);
  sendAjaxRequest("delete", `/api/users/${id}/delete`, {id:id}, userDeletedHandler);
}

function sendRestoreUserRequest(event){
  event.preventDefault();
 
  let id = this.closest('button').getAttribute('data-id');
  console.log("erestoreID: " + id);
  sendAjaxRequest("post", `/api/users/${id}/restore`, {id:id}, userRestoreHandler);
}

function sendCreatePostRequest(event){
  event.preventDefault();

  let eventid = this.closest('button').getAttribute('data-event-id');
  let userid = this.closest('button').getAttribute('data-user-id');
  let content = document.querySelector('div#new-post textarea').value;


  sendAjaxRequest("put", `/api/events/${eventid}/posts/create`, {eventid: eventid, userid: userid, content: content}, postCreatedHandler);

}

function EditPost(event){
  event.preventDefault();


       postContent = $('#post-body');
       let content = this.closest('button').getAttribute('data-post-content');
      
      $('#post-body').val(content);
      $('#edit-modal').modal();
}

function sendSavePostRequest(){
  let postid = this.closest('button').getAttribute('data-post-id');
  let eventid = this.closest('button').getAttribute('data-post-event');

  sendAjaxRequest('POST', `/api/events/${eventid}/posts/${postid}/edit`, {eventid: eventid, content: $('#post-body').val(), postid: postid}, savePostHandler)
}


function sendDeleteEventRequest(event){
  event.preventDefault();
  
  let id = this.closest('button').getAttribute('data-id');

  sendAjaxRequest("delete", `/api/events/${id}/delete`, {id: id}, eventDeletedHandler);
}

function sendRestoreEventRequest(event){
  event.preventDefault();

  let id = this.closest('button').getAttribute('data-id');

  sendAjaxRequest("post", `/api/events/${id}/restore`, {id: id}, eventRestoreHandler);
}
/*--------*/

/* HANDLERS */
function addCollaboratorHandler(){
   if(this.status == 404){
      let old_tbody = document.querySelector("table#search-results tbody");
      let new_tbody = document.createElement('tbody');  
      let row = new_tbody.insertRow(0);
      let cell1= row.insertCell(0);
      cell1.classList.add("alert-danger");
      cell1.innerText = "Invalid email: make sure the user is registered.";
      old_tbody.parentNode.replaceChild(new_tbody, old_tbody);
   }
   else if (this.status==200){
     let user = JSON.parse(this.responseText);
     let tbody = document.querySelector("tbody#edit-collaborators");

     let tr = tbody.insertRow(0);
     tr.setAttribute('data-id', user.id);
     tr.innerHTML = `
      <th scope="row">${user.id}</th>
      <td>${user.name}</td>
      <td>
      <a data-id=${user.id} id="remove-collaborator" class="nav-link">🗑️</a> 
      </td>
      </tr>
    `;       
   }
   else if(this.status == 500){
    let old_tbody = document.querySelector("table#search-results tbody");
    let new_tbody = document.createElement('tbody');  
    let row = new_tbody.insertRow(0);
    let cell1= row.insertCell(0);
    cell1.classList.add("alert-warning");
    cell1.innerText = "User is already collaborating.";
    old_tbody.parentNode.replaceChild(new_tbody, old_tbody);
   }

}

function collaboratorRemovedHandler(){
  let row = JSON.parse(this.responseText);
  let event_id = row['event_id'];
  let user_id = row.user_id;

  if(this.status != 200) window.location = `/events/${event_id}`;

  let tabelRow = document.querySelector('tr[data-id="' + user_id +'"]');
  tabelRow.remove();  
}

function eventDeletedHandler(){
  let event = JSON.parse(this.responseText);
  if(this.status == 200){
    //chanage button
    let new_button = document.createElement('button');
    new_button.classList.add('btn', 'btn-success');
    new_button.setAttribute('id', 'restore-event-btn');
    new_button.setAttribute('type', 'buttton');
    new_button.setAttribute('data-id', event['id']);
    new_button.innerHTML = "Restore";
    new_button.addEventListener('click', sendRestoreEventRequest);
    let old_button = document.getElementById('changeable-element' + event['id']).firstElementChild;
    old_button.replaceWith(new_button);
    //change info
    let new_info = document.createElement('td');
    new_info.setAttribute('id', 'deleted-status' + event['id']);
    new_info.innerHTML = "Deleted";
    let old_info = document.getElementById('active-status' + event['id']);
    old_info.replaceWith(new_info);

    const alert = document.createElement('div');
    alert.classList.add("alert", "alert-success");
    alert.innerText = "Event was successfully deleted!";
    const manageEventDiv = document.querySelector('div#admin-management');
    (manageEventDiv.parentElement).insertBefore(alert, manageEventDiv);

    setTimeout(() => {
      alert.parentElement.removeChild(alert);
    }, 3000);
  }
  else if(this.status == 404){
    const alert = document.createElement('div');
    alert.classList.add("alert", "alert-danger");
    alert.innerText = "Something wrong, event not found!";
    const manageEventDiv = document.querySelector('div#admin-management');
    (manageEventDiv.parentElement).insertBefore(alert, manageEventDiv);
    setTimeout(() => {
      alert.parentElement.removeChild(alert);
    }, 3000);
  }
  else{
    const alert = document.createElement('div');
    alert.classList.add("alert", "alert-danger");
    alert.innerText = "Something wrong, event not deleted!";
    const manageEventDiv = document.querySelector('div#admin-management');
    (manageEventDiv.parentElement).insertBefore(alert, manageEventDiv);
    setTimeout(() => {
      alert.parentElement.removeChild(alert);
    }, 3000);
    window.location = '/';
  }
}

function eventRestoreHandler(){
  let event = JSON.parse(this.responseText);
 
  if(this.status == 200){
    //chanage button
    let new_button = document.createElement('button');
    new_button.classList.add('btn', 'btn-danger');
    new_button.setAttribute('id', 'restore-event-btn');
    new_button.setAttribute('type', 'buttton');
    new_button.setAttribute('data-id', event['id']);
    new_button.innerHTML = "Delete";
    new_button.addEventListener('click', sendDeleteEventRequest);
    let old_button = document.getElementById('changeable-element' + event['id']).firstElementChild;
    old_button.replaceWith(new_button);
    //change info
    let new_info = document.createElement('td');
    new_info.setAttribute('id', 'active-status' + event['id']);
    new_info.innerHTML = "Active";
    let old_info = document.getElementById('deleted-status' + event['id']);
    old_info.replaceWith(new_info);

    const alert = document.createElement('div');
    alert.classList.add("alert", "alert-success");
    alert.innerText = "Event was successfully restored!";
    const manageEventDiv = document.querySelector('div#admin-management');
    (manageEventDiv.parentElement).insertBefore(alert, manageEventDiv);
    
    setTimeout(() => {
      alert.parentElement.removeChild(alert);
    }, 3000);
  }
  else if(this.status == 404){
    const alert = document.createElement('div');
    alert.classList.add("alert", "alert-danger");
    alert.innerText = "Something wrong, event not found!";
    const manageEventDiv = document.querySelector('div#admin-management');
    (manageEventDiv.parentElement).insertBefore(alert, manageEventDiv);
    setTimeout(() => {
      alert.parentElement.removeChild(alert);
    }, 3000);
  }
  else{
    const alert = document.createElement('div');
    alert.classList.add("alert", "alert-danger");
    alert.innerText = "Something wrong, event not deleted!";
    const manageEventDiv = document.querySelector('div#admin-management');
    (manageEventDiv.parentElement).insertBefore(alert, manageEventDiv);
    setTimeout(() => {
      alert.parentElement.removeChild(alert);
    }, 3000);
    window.location = '/';
  }

}

function reviewEventHandler(){
  
  let review = JSON.parse(this.responseText);

  let review_score = document.querySelector("p#event-reviews");
  review_score.textContent = review['review'];
}

function postCreatedHandler() {
  //post[0]->post post[1]->username post[2]->user photo path
  let post = JSON.parse(this.responseText);
  let new_post = document.createElement('article');
  new_post.classList.add('post', 'p-3', 'mb-3');
  new_post.innerHTML = `
    <div class="d-flex flex-row align-items-center">
        <img src=${post[2]} class="rounded-circle mr-2" alt="User Photo" width="50px">
        <h6> <b>${post[1]}</b> says: </h6>
    </div>
    <p id="comment-body">${post[0].content}</p>
    <p id="comment-datetime" class="text-right">${post[0].post_time}</p>
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

function savePostHandler(msg){
  $(postContent).text(msg['new_content']);
  $('#edit-modal').modal('hide');
}


function userDeletedHandler() {
  let user = JSON.parse(this.responseText);
  if(this.status == 200){
    //chanage button
    let new_button = document.createElement('button');
    new_button.classList.add('btn', 'btn-success');
    new_button.setAttribute('id', 'restore-user-btn');
    new_button.setAttribute('type', 'buttton');
    new_button.setAttribute('data-id', user['id']);
    new_button.innerHTML = "Restore";
    new_button.addEventListener('click', sendRestoreUserRequest);
    let old_button = document.getElementById('changeable-element' + user['id']).firstElementChild;
    old_button.replaceWith(new_button);
    //change info
    let new_info = document.createElement('td');
    new_info.setAttribute('id', 'deleted-status' + user['id']);
    new_button.setAttribute('data-id', user['id']);
    new_info.innerHTML = "Suspended";
    let old_info = document.getElementById('active-status' + user['id']);
    old_info.replaceWith(new_info);

    const alert = document.createElement('div');
    alert.classList.add("alert", "alert-success");
    alert.innerText = "User was successfully banned!";
    const manageEventDiv = document.querySelector('div#admin-management');
    (manageEventDiv.parentElement).insertBefore(alert, manageEventDiv);

    setTimeout(() => {
      alert.parentElement.removeChild(alert);
    }, 3000);
  }
  else if(this.status == 404){
    const alert = document.createElement('div');
    alert.classList.add("alert", "alert-danger");
    alert.innerText = "Something wrong, user not found!";
    const manageEventDiv = document.querySelector('div#admin-management');
    (manageEventDiv.parentElement).insertBefore(alert, manageEventDiv);
    setTimeout(() => {
      alert.parentElement.removeChild(alert);
    }, 3000);
  }
  else{
    const alert = document.createElement('div');
    alert.classList.add("alert", "alert-danger");
    alert.innerText = "Something wrong, user not deleted!";
    const manageEventDiv = document.querySelector('div#admin-management');
    (manageEventDiv.parentElement).insertBefore(alert, manageEventDiv);
    setTimeout(() => {
      alert.parentElement.removeChild(alert);
    }, 3000);
    window.location = '/';
  }
}


function userRestoreHandler() {
  let user = JSON.parse(this.responseText);
 
  if(this.status == 200){
    //chanage button
    let new_button = document.createElement('button');
    new_button.classList.add('btn', 'btn-danger');
    new_button.setAttribute('id', 'restore-user-btn');
    new_button.setAttribute('type', 'buttton');
    new_button.setAttribute('data-id', user['id']);
    new_button.innerHTML = "Suspend";
    new_button.addEventListener('click', sendDeleteUserRequest);
    let old_button = document.getElementById('changeable-element' + user['id']).firstElementChild;
    old_button.replaceWith(new_button);
    //change info
    let new_info = document.createElement('td');
    new_info.setAttribute('id', 'active-status' + user['id']);
    new_button.setAttribute('data-id', user['id']);
    new_info.innerHTML = "Active";
    let old_info = document.getElementById('deleted-status' + user['id']);
    old_info.replaceWith(new_info);

    const alert = document.createElement('div');
    alert.classList.add("alert", "alert-success");
    alert.innerText = "User was successfully restored!";
    const manageEventDiv = document.querySelector('div#admin-management');
    (manageEventDiv.parentElement).insertBefore(alert, manageEventDiv);
    
    setTimeout(() => {
      alert.parentElement.removeChild(alert);
    }, 3000);
  }
  else if(this.status == 404){
    const alert = document.createElement('div');
    alert.classList.add("alert", "alert-danger");
    alert.innerText = "Something wrong, user not found!";
    const manageEventDiv = document.querySelector('div#admin-management');
    (manageEventDiv.parentElement).insertBefore(alert, manageEventDiv);
    setTimeout(() => {
      alert.parentElement.removeChild(alert);
    }, 3000);
  }
  else{
    const alert = document.createElement('div');
    alert.classList.add("alert", "alert-danger");
    alert.innerText = "Something wrong, user not deleted!";
    const manageEventDiv = document.querySelector('div#admin-management');
    (manageEventDiv.parentElement).insertBefore(alert, manageEventDiv);
    setTimeout(() => {
      alert.parentElement.removeChild(alert);
    }, 3000);
    window.location = '/';
  }
}


/*  ==========================================
    USER PROFILE UPLOAD PHOTO SNIPPET
* ========================================== */

//SHOW UPLOADED IMAGE/*  

    function readImage(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
    
        reader.onload = function(e) {
          $('#imageResult')
            .attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
      }
    }
   
   
function validateNewEvent(){
  console.log("validating");
  return true;
}    

addEventListeners();

