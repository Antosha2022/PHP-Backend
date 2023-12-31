## Diploma thesis

- You need to create a link shortening web resource.

- The entire project must be implemented with OOP and MVC in mind;
you don't need to use Laravel or WordPress;

### registration and authorization system:
- The registration form or the form for adding a link should be displayed on the main page. It depends on whether the user is registered on the site. In the registration form, it is necessary to check the user's login. If the database already has the same login that the user enters for registration, then an error should be issued;
- The authorization form must accept a login and password and, depending on their correctness, either authorize the user or display an error under the form;

### personal office:
- Only the user's login and the logout button should be displayed in the personal account;

### PhpMailer:
On the page with contacts, the user will be able to send a letter to you by mail. The letter should be sent not through the built-in mail() function, but through the PhpMailer library;


### adding a link and creating its abbreviation
- If the user is authorized, then on the main page he can specify a long link, as well as specify a shortened link and create a shortened link. If he enters an abbreviated name that is already in the data base, then an error should occur
- all links created by a specific user are displayed for him on the main page
- each link can be deleted
- redirection to another website when clicking on a shortened link
