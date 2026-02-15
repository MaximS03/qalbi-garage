// public/js/welcome.js

document.addEventListener('DOMContentLoaded', function () {
    const qalbiSpan = document.querySelector('#qalbi-typing .qalbi-orange');
    const autocareSpan = document.querySelector('#qalbi-typing .autocare-white');
    if (!qalbiSpan || !autocareSpan) return;
    const qalbiText = 'QALBI';
    const autocareText = ' AutoCare';
    let i = 0;
    function type() {
        if (i <= qalbiText.length) {
            qalbiSpan.textContent = qalbiText.slice(0, i);
            autocareSpan.textContent = '';
            i++;
            setTimeout(type, 120);
        } else if (i <= qalbiText.length + autocareText.length) {
            qalbiSpan.textContent = qalbiText;
            autocareSpan.textContent = autocareText.slice(0, i - qalbiText.length);
            i++;
            setTimeout(type, 120);
        }
    }
    type();
});
