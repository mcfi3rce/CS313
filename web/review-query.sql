SELECT display_name, title, review, rating, would_recommend 
FROM public.books_read AS b
INNER JOIN public.user as u
ON b.user_id = u.id
WHERE b.book_id = 3;
