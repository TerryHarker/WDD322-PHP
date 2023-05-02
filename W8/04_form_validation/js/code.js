// Add eventListener to the submit button
// The dot connects two or more in JS, comma insinuates a pause
document.querySelector("button").addEventListener("click", validateForm);

// declare the validateForm function
function validateForm(event) {
  // Always add preventDefault to buttons, so that the page
  // does not refresh.
  // the preventDefault() disables the default behaviour
  // In this example it disables the default behaviour of a button,
  // which is to reload the entire page.
  // This way we can keep the values inside the inputs without losing them
  event.preventDefault();

  // check if a span element with an error message exists in the form
  // if there is a span, remove it from the HTML body
  // so that we have a clean state whenever there is no error message
  if (document.querySelector("form span")) {
    document.querySelectorAll("form span").forEach((spanElement) => {
      spanElement.remove();
    });
  }

  // Define data Object in which we store the user input
  let data = {};
  // Define validationErrors object in which we store errors
  let validationErrors = {};

  // Create properties for the data object
  // With the "value" we say that the value input of e.g. first-name
  // is used as the value for the data of firstName
  data.firstName = document.querySelector("#first-name").value;
  data.lastName = document.querySelector("#last-name").value;
  data.email = document.querySelector("#email").value;
  data.message = document.querySelector("#message").value;

  // Form validation for first name, check if it's empty
  if (!data.firstName) {
    console.error(`No first name provided`);
    validationErrors.firstName = "No first name provided";
  } else {
    console.info(`First name: ${data.firstName}`);
  }

  if (!data.lastName) {
    console.error("No last name provided");
    validationErrors.lastName = "No last name provided";
  } else {
    console.info(`Last name: ${data.lastName}`);
  }

  if (!data.email) {
    console.error("No email provided");
    validationErrors.email = "No email provided";
  } else {
    // console.info(`E-Mail: ${data.email}`);
    // define variable for email RegEx
    let emailRegExp =
      /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    // Test if email is an email with the help of the previously defined regex
    if (!emailRegExp.test(data.email)) {
      // Throw error that email doesn't match
      validationErrors.email = "Invalid E-Mail Address";
      console.error("Invalid E-Mail");
    } else {
      console.info(`E-Mail (${data.email}) is valid`);
    }
  }

  if (!data.message) {
    console.error("No message provided");
    validationErrors.message = "No message provided";
  } else {
    console.info(`Message: ${data.message}`);
    // Check if messages has enough characters (min. 30)
    if (data.message.length <= 30) {
      validationErrors.message = "Not enough characters (min. 30)";
      console.error("Not enough characters");
    } else {
      console.info("Message has enough characters");
    }
  }

  // data and validationErrors are both objects, because we have defined them as such
  // Send data to backend
  // If there are errors
  if (Object.keys(validationErrors).length > 0) {
    // Display error messages
    displayErrors(validationErrors);
  } else {
    // Send form to backend (we use console.log because we have not worked with backend yet)
    console.log("Sending form data to backend");
  }

  function displayErrors(validationErrors) {
    // function that will show errors in the page

    if (validationErrors.firstName) {
      const errorContainer = document.createElement("span");
      errorContainer.innerHTML = validationErrors.firstName;
      document.querySelector("#first-name").after(errorContainer);
    }

    if (validationErrors.lastName) {
      const errorContainer = document.createElement("span");
      errorContainer.innerHTML = validationErrors.lastName;
      document.querySelector("#last-name").after(errorContainer);
    }

    if (validationErrors.email) {
      const errorContainer = document.createElement("span");
      errorContainer.innerHTML = validationErrors.email;
      document.querySelector("#email").after(errorContainer);
    }

    if (validationErrors.message) {
      const errorContainer = document.createElement("span");
      errorContainer.innerHTML = validationErrors.message;
      document.querySelector("#message").after(errorContainer);
    }
  }

  console.log(data);
}

// Event for input in textarea
// document.querySelector("textarea").addEventListener("input", (inputEvent) => {
//   const counterBox = document.createElement("span");
//   counterBox.innerHTML = inputEvent.target.textLength;
//   inputEvent.target.after(counterBox);
// });

// Example with ternary operators
// if (!data.firstName || !data.lastName || data.email || data.message) {
//   !data.firstName
//   ? (validationErrors.firstName = "No First Name")
//   : !data.lastName
//   ? (validationErrors.lastName = "No Last Name")
//   : !data.email
//   ? (validationErrors.email = "No Email")
//   : !data.message
//   ? (validationErrors.message = "No Message");
//   : "";
// } else {
//   console.log(data);
// }
// }

// Event for textarea
document
  .querySelector("textarea")
  .addEventListener("input", (textAreaInput) => {
    // Initialize the counter to 30
    let counter = 30;

    // If else, counterBox div exists
    if (!document.querySelector(".counterBox")) {
      const counterBox = document.createElement("span");
      // set the class of the span element
      counterBox.setAttribute("class", "counterBox");
      counterBox.innerHTML = `Characters needed: ${
        counter - textAreaInput.target.textLength
      }`;
      textAreaInput.target.after(counterBox);
    } else {
      document.querySelector(".counterBox").innerHTML = `Characters needed: ${
        counter - textAreaInput.target.textLength
      }`;
    }

    // Check if the required characters are met
    if (textAreaInput.target.textLength < 31) {
      // reset of the font color if textlength < 31
      document.querySelector(".counterBox").style.color = "red";
    } else {
      document.querySelector(".counterBox").innerHTML =
        "Desired amount reached";
      document.querySelector(".counterBox").style.color = "lime";
    }
  });
