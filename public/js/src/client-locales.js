function getCookie(name) {
    const value = `; ${document.cookie}`;
    const parts = value.split(`; ${name}=`);
    if (parts.length === 2) return parts.pop().split(';').shift();
    return '';
}

function localDateToUtc(dateStr) {
    if (!dateStr) return '';
    try {
        var m = moment(dateStr, ['M/D/YYYY h:mm A', 'YYYY-MM-DDTHH:mm:ss', 'MM/DD/YYYY HH:mm']);
        if (m.isValid()) {
            return m.utc().format('YYYY-MM-DDTHH:mm:ss') + 'Z';
        }
        return dateStr;
    } catch (e) {
        return dateStr;
    }
}

function updateDates() {
    var fromDisplay = document.getElementById('DisplayFrom');
    var toDisplay = document.getElementById('DisplayTo');
    var fromHidden = document.getElementById('From');
    var toHidden = document.getElementById('To');

    if (fromDisplay && fromHidden) {
        fromHidden.value = localDateToUtc(fromDisplay.value);
    }
    if (toDisplay && toHidden) {
        toHidden.value = localDateToUtc(toDisplay.value);
    }
    return true;
}

function convertAllToClientTime(container) {
    var root = container || document;
    var utcElements = root.querySelectorAll('.utctime');

    utcElements.forEach(function (el) {
        var utcText = el.textContent.trim();
        var format = el.getAttribute('data-format') || 'M/D/YYYY h:mm A';
        var noFirst = el.getAttribute('data-nofirst');

        if (utcText) {
            try {
                var m = moment.utc(utcText);
                if (m.isValid()) {
                    var localTime = m.local().format(format);
                    var prev = el.previousElementSibling;
                    if (prev && prev.classList.contains('market-time')) {
                        prev.textContent = localTime;
                    }
                    if (!noFirst) {
                        var input = el.parentElement.querySelector('input[type="text"]');
                        if (input && !input.value) {
                            input.value = localTime;
                        }
                    } else {
                        var input = el.parentElement.querySelector('input[type="text"]');
                        if (input && !input.value) {
                            input.value = localTime;
                        }
                    }
                }
            } catch (e) {}
        }
    });
}

function pollUserData() {
    var token = getCookie('wexscktoken');
    if (!token) return;

    $.ajax({
        type: 'GET',
        url: '/api/users/funds',
        headers: { 'Authorization': 'Bearer ' + token },
        success: function (data) {
            if (data) {
                if (data.balance !== undefined) {
                    $('.wallet-balance').text(parseFloat(data.balance).toFixed(2));
                }
                if (data.exposure !== undefined) {
                    $('.wallet-exposure').text(parseFloat(data.exposure).toFixed(2));
                }
            }
        },
        error: function () {}
    });

    setTimeout(pollUserData, 10000);
}

function pollRefreshToken() {
    setTimeout(pollRefreshToken, 300000);
}

$(document).ready(function () {
    convertAllToClientTime();
});
