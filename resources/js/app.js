import './bootstrap';
window.myFunction = function () {
    var x = document.getElementById("menu");
    if (x.classList.contains("hidden")) {
        x.classList.remove("hidden");
    } else {
        x.classList.add("hidden");
    }
};
window.myFunctionblur = function () {
    var x = document.getElementById("menu");
    if (!x.classList.contains("hidden")) {
        x.classList.add("hidden");
    }
};
window.myFunction1 = function () {
    var x = document.getElementById("ProfileOrLogout");
    if (x.classList.contains("hidden")) {
        x.classList.remove("hidden");
    } else {
        x.classList.add("hidden");
    }
};
window.myFunctionblur1 = function () {
    var x = document.getElementById("ProfileOrLogout");
    if (!x.classList.contains("hidden")) {
        x.classList.add("hidden");
    }
};
const fileInput = document.getElementById('image');
var span = document.getElementById('blueSpan');
var imageDisplay = document.getElementById('imageDisplay'); // Assuming you have an <img> element with id 'imageDisplay'

var uploadImg = document.getElementById('uploadimg');
fileInput.addEventListener('change', event => {
  const files = event.target.files;
  const file = files[0];
  uploadImg.innerHTML = '';
  uploadImg.style.height=0;
  if (file && file.type.startsWith('image')) {
    const reader = new FileReader();
    reader.onload = function (e) {
      imageDisplay.src = e.target.result;
      imageDisplay.className='m-[5%] h-[90%] w-[90%] lg:h-[100%] lg:my-0 lg:w-[80%] lg:mx-[10%]';
    };
    reader.readAsDataURL(file);
  }
  console.log(`filename: ${file.name}`);
  console.log(fileInput.value);
});
/**
 * Displays a confirmation dialog and prevents the default event behavior.
 *
 * @param {Event} event - The event triggered by an action (e.g., click).
 * @param {HTMLElement} element - The element associated with the event.
 *
 * @author Muhammad Imran Israr <mimranisrar6@gmail.com>
 */
window.customeConfirmDialog =function(event, element) {
    event.preventDefault();

    document.querySelector('.confirm-dialog').style.display = 'block';

    const cancelBtn = document.querySelector('#confirm-cancel-btn');

    const deleteBtn = document.querySelector('#confirm-delete-btn');

    cancelBtn.addEventListener('click', function() {
        document.querySelector('.confirm-dialog').style.display = 'none';
    })

    deleteBtn.addEventListener('click', function() {
        window.location.href = element.getAttribute('href');
    })
};


