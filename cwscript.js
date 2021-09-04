// this function checks the user input to make sure they don't input any invalid symbols
function validate(form) {

    input = form.elements[0].value; // set field to the input
    if (input == "") {                        
        alert("You cannot have an empty input")
        return false;
        
    }else if (/[^a-zA-Z0-9 ]/.test(input)) {
        alert("Only a-z, A-Z and 0-9 are allowed as input")
        return false;
        
    }
    
    return true;
}

// adding a movie requires more than one input, therefore we need to have extra validation for the extra fields 
function validateMovie(form) {

    fail = "";
    fail += validateTitle(form.Title.value);    
    fail += validatePrice(form.Price.value);    
    fail += validateYear(form.Year.value);  
    fail += validateGenre(form.Genre.value);    
    fail += validateActor(form.Actor.value);
    
    if (fail == "") {
        alert ("Validated Successfully");   // if the input is in a valid format, then the 'fail' string will be empty
        return true;
    }else{
        alert(fail);   
        return false;   
    }
}

// validating the title field 
function validateTitle(field){
    if (field == "") {
        return "Title field is empty";  
    }else if(/[^a-zA-Z0-9 ]/.test(field)){
        return "Only a-z, A-Z and 0-9 are allowed as input for the title"; 
    }
    return "";  // if we get to this stage then the input is valid and we return an empty string
}

// validating the price field
function validatePrice(field){
    if (field == "") {
        return "Price field is empty ";  
    }else if(/[^0-9.]/.test(field)){
        return "Only numbers are allowed as input for the price ";  
    }
    return "";  
}

// validating the year field
function validateYear(field){
    if (field == "") {
        return "Year field is empty  ";  
    }else if(/[^0-9]/.test(field)){
        return "Only numbers are allowed as input for the year ";  
    }
    return "";  
}

// validating the genre field
function validateGenre(field){
    if (field == "") {
        return "Genre field is empty";  
    }else if(/[^a-zA-Z ]/.test(field)){
        return "Only characters are allowed as input for the genre ";  
    }
    return ""; 
}

// validating the actor field
function validateActor(field){
    if (field == "") {
        return "Actor Name field is empty  ";  
    }else if(/[^a-zA-Z ]/.test(field)){
        return "Only characters are allowed as input for the actor ID";  
    }
    return ""; 
}