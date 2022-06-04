$('.delete').on('click', function () {
    let res = confirm('Подтвердите действие');
    if (!res) {
        return false;
    }
});

$('.sidebar-menu a').each(function () {
    let location = window.location.protocol + '//' + window.location.host + window.location.pathname;
    let link = $(this).attr('href');
    if (link == location) {
        $(this).parent().addClass('active');
        $(this).closest('.treeview').addClass('active');
    }
});

// stop click treeview-panel
const stopClick = document.querySelector('.stop-click');

document.addEventListener('DOMContentLoaded', () => {
    stopClick.style.display = 'none';

    $('input[type=file]').change(function () {
        if ($('input[type=file]').val() == '') {
            $('.btnImport').attr('disabled', true)
        } else {
            $('.btnImport').attr('disabled', false);
        }
    })

    $('#per_page').on('change', function () {
        updateURI('per_page', this.value);
    })

    $('#sort').on('change', function () {
        updateURI('sort_by', this.value);
    })

    // Update uri
    function updateURI(key, value) {
        const pathName = window.location.protocol + "//" + window.location.host + window.location.pathname;
        const getParams = window.location.search;
        let getParam = `?${key}=${value}`;

        if (getParams.includes('?')) {
            let params = window.location.search.split('&');

            if (getParams.includes(key) && params.length > 1) {
                const foundParam = params.find(param => param.includes(key));
                const foundParamIndex = params.findIndex(param => param.includes(key));
                const updatedParam = foundParam.split('=')[0] + '=' + value;

                params.splice(foundParamIndex, 1);

                if (updatedParam.includes('?')) {
                    params.unshift(updatedParam);
                } else {
                    params.push(updatedParam);
                }

                getParam = params.join('&');
            } else if (!getParams.includes(key)) {
                getParam = getParams + getParam.replace('?', '&');
            }
        }

        window.location.href = pathName + getParam;
    }
});


