async function movieLists(url) {
  const response = await fetch(url);
  const datas = await response.json();

  showLists(datas);
}

function showLists(datas) {
  const lists = document.querySelector(".textbox");

  datas.map((data) => {
    const addToLists = `<article> 

        <p>Full Name : ${data.name}</p>
        <p>Email : ${data.email}</p>
        <p>Favorite TV Show : ${data.tvshow}</p>
    
    </article>`;

    lists.innerHTML += addToLists;
  });
}

const url = "https://fransiskus42.web582.com/dynamic/movie_db/app/select.php";

movieLists(url);
