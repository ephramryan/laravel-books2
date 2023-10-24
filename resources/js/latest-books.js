const loadData = async () => {

    const ul = document.querySelector('#latest-books');

    // display the animated loader
    ul.innerHTML = '<li class="loader"></li>';

    // fetch
    const response = await fetch('/api/books/latest');

    // hide the animated loader
    ul.innerHTML = '';

    const data_array = await response.json();


    data_array.forEach(

        book_object => {
            // console.log(book_object);

            const li = document.createElement('li');
            li.innerHTML = `
                <h3>${book_object.title}</h3>
                <img src="${book_object.image}">
            `;

            ul.appendChild(li);
        }

    )

}

loadData();