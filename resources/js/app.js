import './bootstrap';
import '../css/app.css';


document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('sort').addEventListener('change', function () {
        let sortOption = this.value;
        let url = '';

        
        if (sortOption === 'alphabet') {
            url = route('books.sortbyalphabet');  
        }
        
        else if (sortOption === 'newest') {
            url = route('books.sortbynewestrelease');  
        } 
        else if (sortOption === 'ketersediaan') {
            url = route('books.sortbyketersediaan');
        }

        else if (sortOption === 'genre') {
            url = route('books.sortbygenre');
        }
        else {
            url = route('books.index');  
        }

       
        window.location.href = url;
    });
});


function route(routeName) {
    const routes = {
        'books.sortbyalphabet': '/books/sortbyalphabet',
        'books.sortbynewestrelease': '/books/sortbynewestrelease',
        'books.sortbyketersediaan': '/books/sortbyketersediaan',  
        'books.sortbygenre': '/books/sortbygenre',  
        'books.index': '/books'  
    };
    
    return routes[routeName] || '/';  
}
