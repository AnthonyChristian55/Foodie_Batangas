// Get the map toggle elements and map containers
const mapToggles = document.querySelectorAll(".fa-map-marker"); // Select all map marker icons
const mapContainers = document.querySelectorAll("#map-container");

// Add click event listener to each map toggle
mapToggles.forEach((mapToggle, index) => {
  mapToggle.addEventListener("click", function() {
    mapContainers[index].style.display = mapContainers[index].style.display === "none" ? "block" : "none";
  });
});

//declearing html elements

const imgDiv = document.querySelector('.profile-pic-div');
const img = document.querySelector('#photo');
const file = document.querySelector('#file');
const uploadBtn = document.querySelector('#uploadBtn');

//if user hover on img div 

imgDiv.addEventListener('mouseenter', function(){
    uploadBtn.style.display = "block";
});

//if we hover out from img div

imgDiv.addEventListener('mouseleave', function(){
    uploadBtn.style.display = "none";
});

//lets work for image showing functionality when we choose an image to upload

//when we choose a photo to upload

file.addEventListener('change', function(){
    //this refers to file
    const choosedFile = this.files[0];

    if (choosedFile) {

        const reader = new FileReader(); //FileReader is a predefined function of JS

        reader.addEventListener('load', function(){
            img.setAttribute('src', reader.result);
        });

        reader.readAsDataURL(choosedFile);

    }
});
/* This the Sidebar js*/
    function closeSidebar() {
    const sidebar = document.getElementById('sidebar');
    const content = document.getElementById('content');
    sidebar.style.left = '-250px';
    content.style.marginLeft = '0';
  }

  document.getElementById('toggle-btn').addEventListener('click', function() {
    const sidebar = document.getElementById('sidebar');
    const content = document.getElementById('content');
    if (sidebar.style.left === '-250px') {
      sidebar.style.left = '0';
      content.style.marginLeft = '250px';
    } else {
      closeSidebar();
    }
  });
  /* Comment js*/
function toggleCommentSection(link, event) {
  event.preventDefault(); // Prevents the default behavior (scrolling to the top) of the anchor element
  var spot = link.closest('.spot');
  var commentSection = spot.querySelector('.comment-section');

  // Toggle the display of the comment section
  if (commentSection.style.display === 'none' || commentSection.style.display === '') {
    commentSection.style.display = 'block';
  } else {
    commentSection.style.display = 'none';
  }
}



// Function to set the selected option after form submission
document.addEventListener('DOMContentLoaded', function() {
  var sortSelect = document.getElementById('sort');
  var currentSortOption = '<?php echo $_GET["sort"] ?? "latest"; ?>'; // PHP code to get current sort option if any
  
  if (currentSortOption) {
    sortSelect.value = currentSortOption;
  }
});
