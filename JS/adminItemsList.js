const handleAddItems = () => {
    let foodName = document.getElementById('exampleInputName');
    let foodPrice = document.getElementById('exampleInputPrice');
    let foodPhotoURL = document.getElementById('exampleInputPhotoURL');
    console.log(foodName, foodPrice, foodPhotoURL);

    const tableBody = document.getElementById('table-body');
    tableBody.innerHTML += `
    <tr>
        <th scope="row" class="align-middle">10</th>
        <td class="align-middle">${foodName.value}</td>
        <td class="align-middle">Tk ${foodPrice.value}/-</td>
        <td class="align-middle">'${foodPhotoURL.value}'</td>
        <td>
            <i class="btn btn-outline-success bi bi-pencil-square"></i>
            <i class="btn btn-outline-danger bi bi-archive"></i>
        </td>
    </tr>`
    foodName.value = "";
    foodPrice.value = "";
    foodPhotoURL.value = "";
}

document.getElementById('btnDelete').addEventListener('click', event => {
    event.target.parentElement.parentElement.style.display = 'none';
})