var prev=document.getElementById('preview');

function changePreviewUrl(id){
    switch(id){
        case 1:
            prev.src="https://drive.google.com/file/d/10qVaPRbdJ3RrSdg-JZ_EmO_-z1OSYser/preview";//Recrutement Presentation embeded url
            break;
        case 2:
            prev.src="https://drive.google.com/file/d/19gW3MwHT-Xz_vFoG0GmQCFS6EcyWN2Xc/preview";//ANESP internships embeded url
            break;  
        case 3:    
            prev.src="https://drive.google.com/file/d/1Xwk2lPP4fl3knKERDxUYWduRJz5S2b0h/preview";//Job Description embeded url
            break;
        case 4:
            prev.src="https://drive.google.com/file/d/1Bx2IEbeDGpWFQiFC5iS7Tb9aRg2NUWks/preview";//Standars And Practices embeded url
            break;
        case 5:  
            prev.src="https://drive.google.com/file/d/1rR_KXwdgD3mFaB9ZbWStsomIxUpgAM81/preview";//Acronyms Tongue embeded url
            break; 
	      case 6:  
            prev.src="https://drive.google.com/file/d/1ZcZLSfm32bz9kENpaWO1AyAr2_rn--M7/preview";//Anesp Business Presentation embeded url
            break; 
        default:
            prev.src="https://drive.google.com/file/d/10qVaPRbdJ3RrSdg-JZ_EmO_-z1OSYser/preview";//Recrutement Presentation embeded url
            break;           
    }
}

function searchFunction(){
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("searchBar");
    filter = input.value.toUpperCase();
    table = document.getElementById("docsTable");
    tr = table.getElementsByTagName("tr");

    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}