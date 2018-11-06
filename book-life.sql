#AWESOME 

CREATE TABLE public.user
(
	id SERIAL NOT NULL PRIMARY KEY,
	username VARCHAR(100) NOT NULL UNIQUE,
	password VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
	display_name VARCHAR(100) NOT NULL
);

CREATE TABLE public.book
(
	id SERIAL NOT NULL PRIMARY KEY,
	title VARCHAR(100) NOT NULL,
    author VARCHAR(100) NOT NULL,
    publisher VARCHAR(100) NOT NULL,
    isbn VARCHAR(100) NOT NULL,
    cover_art VARCHAR(255) NOT NULL
);

CREATE TABLE public.books_read
(
	id SERIAL NOT NULL PRIMARY KEY,
	user_id INT NOT NULL REFERENCES public.user(id),
	book_id INT NOT NULL REFERENCES public.book(id),
    title VARCHAR(255) NOT NULL,
	rating INT NOT NULL,
	review TEXT,
    would_recommend BOOLEAN
);

CREATE TABLE public.want_to_read
(
	id SERIAL NOT NULL PRIMARY KEY,
	user_id INT NOT NULL REFERENCES public.user(id),
	book_id INT NOT NULL REFERENCES public.book(id),
	desire_level FLOAT NOT NULL
);

insert into public.user
(	username,
    password,
    email,
    display_name
    
)
values
(	'mcfi3rce',
    'thisissafe',
    'aomcpherson@gmail.com',
    'Adam McPherson'
);

insert into public.book
(	title,
    author,
    publisher,
    isbn,
    cover_art
    
)
values
(	'The Book of Mormon',
    'Mormon',
    'The Church of Jesus Christ of Latter-Day Saints',
    'B000GBBK66',
    'https://upload.wikimedia.org/wikipedia/commons/e/e5/Mormon-book.jpg'
);


