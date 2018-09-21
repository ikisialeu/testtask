(function() {
  const URL = "http://localhost";
  const loader = new Loader(URL);

  // Create comment container
  function commentContainer(text) {
    const container = document.createElement("div");
    container.className = "comment";

    const comment = document.createElement("p");
    comment.innerHTML = text;

    container.appendChild(comment);
    return container;
  }

  // Add comment on page
  function createComment(text) {
    const section = document.getElementById("comments");
    const container = commentContainer(text)
    
    section.appendChild(container);
  }

  // Get add button
  const addCommentBtn = document.getElementById("add"); 
  
  // Set action for comment add button
  addCommentBtn.onclick = () => {  
    // Get commnet from input
    const comment = document.getElementById("comment");
    
    // Check comment 
    if(!comment) {
      return;
    }

    // Gte parameters from URL
    const params = loader.parseURL(location);
    
    // Execute query
    loader.post({path: "controllers/addCommentCn", params, data: {comment: comment.value}})
    .then(data => {
      if(data) {
        createComment(comment.value);
        
        // Clear comment input
        comment.value = "";
      }
    });
  }
})();