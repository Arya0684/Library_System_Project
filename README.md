# Library Management System

Project Overview :-

The Library Management System is a web-based application designed to manage library operations efficiently. It allows members to browse, borrow, and return books while enabling administrators to manage books and monitor transactions. The system ensures proper tracking of borrowed books and provides a seamless user experience.

Features :-

For Members :-
- User registration and login
- Browse available books
- Borrow books with a selected borrow date
- View a list of borrowed books
- Return borrowed books
- Personalized borrowed book history

For Admin :-
- Admin login
- Add, update, and delete books
- View all borrowed books by members
- Update book availability status


Tables (Database):-

1. user 
   - id, name, email, password, role  

2. books
   - id, title, author, status  

3. transaction
   - id, user_id, book_id, title, author, borrow_date, return_date  


Working Functionality :-

1. Member Login/Register :- 
   Users can register and log in to borrow books.  

2. Browse Books :-
   Members can see only available books.  

3. Borrow Books :-
   Members select a book, choose a borrow date, and confirm the borrow.  

4. Return Books :- 
   Members can return borrowed books, which updates the book status to "Available".  

5. Admin Management :-
   Admins can add new books, update book details, and view all transactions.  

