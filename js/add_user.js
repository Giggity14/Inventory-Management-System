const addUserButton = document.querySelector(".add");
const popup = document.querySelector(".popup");
const closeButton = document.querySelector(".popup-close-button");
const overlay = document.querySelector(".overlay");
const form = document.querySelector(".popup form");
const submitButton = document.getElementById("submit-button"); // assuming your button has id="submit-button"

addUserButton.addEventListener("click", () => {
  popup.style.display = "block";
  overlay.style.display = "block";
});

closeButton.addEventListener("click", () => {
  popup.style.display = "none";
  overlay.style.display = "none";
});

submitButton.addEventListener("click", async (event) => {
  event.preventDefault();

  // Assuming the form has a valid action attribute pointing to your PHP script
  const formData = new FormData(form);
  
  try {
    const response = await fetch(form.action, {
      method: form.method,
      body: formData,
    });

    if (response.ok) {
      console.log("Form submitted successfully");
      // Hide the pop-up and overlay
      popup.style.display = "none";
      overlay.style.display = "none";

      // Clear the form
      form.reset();
    } else {
      console.error("Form submission failed");
    }
  } catch (error) {
    console.error("Error during form submission:", error);
  }
});
