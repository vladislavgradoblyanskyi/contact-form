// importowanie bibliotek
import axios from "axios";
import Swal from "sweetalert2";

const form = document.querySelector("#send")
const backdrop = document.querySelector(".backdrop");

form.addEventListener("submit",async (evt)=>{
    evt.preventDefault();

    const imie = document.querySelector("#imie").value.trim();
    const nazwisko = document.querySelector("#nazwisko").value.trim();
    const email = document.querySelector("#email").value.trim();
    const komentarz = document.querySelector("#komentarz").value.trim();

    if(!imie || !nazwisko || !email){
        Swal.fire({
        title: "musisz wypelnic pola!",
        icon: "info",
    });
        return;
    }
    try{
        const res = await axios.post("http://localhost/api/send.php",{imie,nazwisko,email,komentarz});
        Swal.fire({
            title:"Sukces",
            icon:"success"
            });

        form.reset();
    }
    catch{
        Swal.fire({
            title:"Błąd serwera",
            icon:"error"
            });
    }
})
document.querySelector("#tablica-btn").addEventListener("click",async ()=>{
    try{
        const res = await axios.get("http://localhost/api/wiadomosci.php");
        document.querySelector("#messages").innerHTML = res.data;
    }
    catch{
        Swal.fire({
            title:"Błąd serwera",
            icon:"error"
            });        
    }
})