function filterFunction(el) {
    const childrens = $(el).parents('.dropdown-menu').find('.dropdown-result').children();
    filter = $(el).val().toUpperCase();
    for (i = 0; i < childrens.length; i++) {
        txtValue = childrens[i].textContent || childrens[i].innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            childrens[i].style.display = "";
        } else {
            childrens[i].style.display = "none";
        }
    }
}

const dropdownSearchable = document.querySelectorAll('#dropdown-search-input');
dropdownSearchable.forEach(dropdown => {
    dropdown.addEventListener('keyup', function (e) {
        filterFunction(e.target)
    })
});


const grabPointers = document.querySelectorAll('.cursor-grab');
grabPointers.forEach(el => {
    el.addEventListener('mousedown', function () {
        el.setAttribute('style', 'cursor: grabbing')
    })
})
