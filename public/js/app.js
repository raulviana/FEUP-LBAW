/* GET BUTTONS */

const addPostBtn = document.querySelector("div#new-post button");

const passwordField = document.getElementById('password');
const confirmPasswordField = document.getElementById('confirm-password');

const likeBtn = document.querySelector("a#up-vote");
const dislikeBtn  =document.querySelector("a#down-vote");

const delEventBtn = document.querySelector("button#del-event");

const searchUsersField = document.querySelector("input#search-users");

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

  if(searchUsersField){
    searchUsersField.addEventListener('keyup', sendSearchUserRequest);
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


function sendSearchUserRequest(event){
  event.preventDefault();

  let searchField = searchUsersField.value;
 
  sendAjaxRequest("post", `/api/users/search`, {searchField: searchField}, userResultsHandler);
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

function userResultsHandler(){
  if(this.status == 200){
    let users = JSON.parse(this.responseText);

    if(users.length > 0){
      let old_tbody = document.querySelector("table#search-results tbody");
    
      let new_tbody = document.createElement('tbody');
      
      for(let i=0; i<users.length; i++){
        // Create an empty <tr> element and add it to the 1st position of the table:
        let row = new_tbody.insertRow(0);

        // Insert new cells (<td> elements) at the 1st and 2nd position of the "new" <tr> element:
        let cell1 = row.insertCell(0);
        let cell2 = row.insertCell(1);
        let cell3 = row.insertCell(2);

        cell1.innerText = users[i].id;
        cell2.innerText = users[i].name;
        cell3.innerText = users[i].email; 
    }

      old_tbody.parentNode.replaceChild(new_tbody, old_tbody)
          
    }
    else{
      let old_tbody = document.querySelector("table#search-results tbody");
      let new_tbody = document.createElement('tbody');  
      let row = new_tbody.insertRow(0);
      let cell1= row.insertCell(0);
      cell1.innerText = "No results to match "
      old_tbody.parentNode.replaceChild(new_tbody, old_tbody);
    }
    
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
  window.location = '/';
}

function reviewEventHandler(){
  let review = JSON.parse(this.responseText);

  let review_score = document.querySelector("p#event-reviews");
  review_score.textContent = review['review'];
}

function postCreatedHandler() {
  //post[0]->post post[1]->username post[2]->user photo path
  let post = JSON.parse(this.responseText);
  console.log(post[0]);
  let new_post = document.createElement('article');
  new_post.classList.add('post', 'p-3', 'mb-3');
  new_post.innerHTML = `
    <div class="d-flex flex-row align-items-center">
        <img src=${post[2]} class="rounded-circle mr-2" alt="Owner" width="50px">
        <h6> <b>${post[1]}</b> says... </h6>
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
   
   
    

addEventListeners();

