let deleteButtons = document.querySelectorAll('.delete-button');
let answer = false;

deleteButtons.forEach(
    element => {
        element.addEventListener('click', () => {
            answer = confirm('Are you sure to delete this task?');
        })
    }
);

function isOK() {
    return answer;
}