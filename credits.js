var teamMembers = [
    'Ranjit Patil',
    'Shubham Hase',
    'Chinmai Gaikwad',
    'Bhaskar Harugade',
    'Vaishnavi Chavan',
    'Shreedhar Phase',
    'Mentor P. S. Pawar'
];

var nameElement = document.getElementById("credits");
var index = 0;

function showNextMember() {
    if (index < teamMembers.length) {
        var memberName = teamMembers[index];
        nameElement.innerHTML = "This application devloped and maintained by : "+memberName;
        nameElement.classList.add('active');

        setTimeout(function () {
            nameElement.style.opacity = '1';
            nameElement.style.transform = 'translateY(0)';
        }, 100);

        index++;

        setTimeout(function () {
            nameElement.style.opacity = '0';
            nameElement.style.transform = 'translateY(20px)';
            nameElement.classList.remove('active');
            showNextMember();
        }, 3000); // Change the duration (in milliseconds) between names
    } else {
        // Reset the index to loop through the names again
        index = 0;
        showNextMember();
    }
}

showNextMember();