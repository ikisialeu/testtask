(function() {
  const URL = "http://localhost";
  const loader = new Loader(URL);

  // Date format validation
  function dateCheck(date) {
    return (!isNaN(Date.parse(date))) ? true : false;
  }

  // Mark error field
  function errorField(element) {
    element.classList.add("error");
  }

  // Clear mark error field
  function clearErrorField(elements) {
    elements.forEach(element => {
      element.classList.remove("error")
    });
  }

  // Get add button
  const addNewsBtn = document.getElementById("add"); 
  
  // Set action for news add button 
  addNewsBtn.onclick = () => { 
    // Get data from inputs 
    const title = document.getElementById("title");
    const date = document.getElementById("date");
    const text = document.getElementById("text");
    
    // Clear mark error fields 
    clearErrorField([title, date, text]);
    
    // Check input fields
    if(!title.value) {
      errorField(title);
      return;
    }
    
    if(!date.value || !dateCheck(date.value)) {
      errorField(date);
      return;
    }
    
    if(!text.value) {
      errorField(text);
      return;
    }

    // Get parameters from URL
    const params = loader.parseURL(location);
    
    // Set obiect for query
    const settings = {
      path: "controllers/addNewsCn", 
      params, 
      data: {
        title: title.value,
        date: date.value,
        text: text.value
      }
    }
    
    // Execute query
    loader.post(settings).then(data => alert("News was successfully saved"));
  }

  // Get cancel button
  const canselBtn = document.getElementById("cancel");
  
  // Set action for cancel button
  canselBtn.onclick = () => history.back();
})();