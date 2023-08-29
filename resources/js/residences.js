document.addEventListener("DOMContentLoaded", function () {
    const downloadButtons = document.querySelectorAll('.js-btn-download-all');

    downloadButtons.forEach((btnDownloadAll) => {
        btnDownloadAll.addEventListener('click', function (e) {

            e.preventDefault();

            const eventId = this.getAttribute('data-ct_event_id');

            if (eventId) {
                fetch(tailpress.ajax_url, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
                    },
                    body: 'action=ct_download_documents&event_postid=' + eventId
                })
                    .then(response => {
                        if (response.ok) {
                            return response.text();
                        } else {
                            throw new Error('Request failed with status: ' + response.status);
                        }
                    })
                    .then(data => {
                        window.location = data;
                    })
                    .catch(error => {
                        console.error('Fetch error:', error);
                    });
            }
        });
    })
});
