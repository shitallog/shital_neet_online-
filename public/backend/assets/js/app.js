document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('part').addEventListener('change', function () {
        var part = this.value;
        var rightMarks = document.getElementById('right');
        var wrongMarks = document.getElementById('wrong');

        if (part === 'A') {
            rightMarks.setAttribute('placeholder', 'Enter marks for correct answer (+4)');
            wrongMarks.setAttribute('placeholder', 'Enter minus marks for wrong answer (-1)');
        } else if (part === 'B') {
            rightMarks.setAttribute('placeholder', 'Enter marks for correct answer (+4)');
            wrongMarks.setAttribute('placeholder', 'Enter minus marks for wrong answer (-1)');
        }
    });
});
