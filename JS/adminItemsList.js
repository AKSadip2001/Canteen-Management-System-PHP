elements = document.getElementsByClassName('btnDelete');
element2 = document.getElementsByClassName('btnEdit');
element3 = document.getElementById('btn_add');

for (var i = 0; i < elements.length; i++) {
    elements[i].addEventListener('click', event => {
        if(confirm("Are you sure you want to delete?")){
            let foodName = event.target.parentElement.parentElement.getElementsByClassName('fName')[0].innerHTML;
            let foodImage = event.target.parentElement.parentElement.getElementsByClassName('fImage')[0].innerHTML;

            // console.log(foodName);
            // console.log(2);
            $.ajax({
                type: "POST",
                url: "delete.php",
                data: {
                    fName: foodName,
                    fImage: foodImage
                },
                success: function(){
                    document.location.reload();
                }
            });
        }
    }, false);
}

for (var i = 0; i < element2.length; i++) {
    element2[i].addEventListener('click', event => {
        console.log("Hello Edit")
        let sNo = event.target.parentElement.parentElement.getElementsByClassName('sNo')[0].innerHTML;
        let editableFoodName = event.target.parentElement.parentElement.getElementsByClassName('fName')[0].innerHTML;
        let editableFoodPrice = event.target.parentElement.parentElement.getElementsByClassName('fPrice')[0].innerHTML;
        editableFoodPrice = parseInt(editableFoodPrice?.split('TK ')[1] || 0);

        document.querySelector('#sNo').setAttribute("value", sNo);
        document.querySelector('#eName').setAttribute("value", editableFoodName);
        document.querySelector('#ePrice').setAttribute("value", editableFoodPrice);  
    }, false);
}

element3.addEventListener('click', event => {
    if(confirm("Are you sure you want to update?")){
        let sNo = event.target.parentElement.parentElement.getElementsByClassName('sNo')[0].value;
        let eName = event.target.parentElement.parentElement.getElementsByClassName('eName')[0].value;
        let ePrice = event.target.parentElement.parentElement.getElementsByClassName('ePrice')[0].value;

        console.log(sNo);
        console.log(eName);
        console.log(ePrice);
        $.ajax({
            type: "POST",
            url: "updateItem.php",
            data: {
                sNo: sNo,
                eName: eName,
                ePrice: ePrice
            },
            success: function(){
                document.location.reload();
            }
        });
    }
}, false);