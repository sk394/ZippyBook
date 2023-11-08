CREATE DATABASE IF NOT EXISTS isp;

-- Use the database
USE isp;

-- Create the "books" table
CREATE TABLE books (
 book_isbn     VARCHAR(20) COLLATE latin1_general_ci NOT NULL,
 book_title    VARCHAR(60) COLLATE latin1_general_ci DEFAULT NULL,
 book_author   VARCHAR(60) COLLATE latin1_general_ci DEFAULT NULL,
 book_image    VARCHAR(40) COLLATE latin1_general_ci DEFAULT NULL,
 book_descr    TEXT        COLLATE latin1_general_ci,
 book_price    DECIMAL(6,2) NOT NULL,
 book_quantity INT NOT NULL,
 flag          BOOLEAN NOT NULL
);

ALTER TABLE books
ADD AffiliateLink VARCHAR(2048) COLLATE latin1_general_ci DEFAULT NULL;

-- Insert some sample books
INSERT INTO books (book_isbn, book_title, book_author, book_image, book_descr, book_price, book_quantity, flag) VALUES
    ('123-45','Book A', 'Author 1', 'mobile_app.jpg', 'ksjhdkjshdkh khsdhskjd', '12.90', '10',true),
    ('123-47','Book B', 'Author 1', 'pro_asp4.jpg', 'ksjhdkjshdkh khsdhskjd', '12.90', '10',false);

INSERT INTO `books` (`book_isbn`, `book_title`, `book_author`, `book_image`, `book_descr`, `book_price`, `book_quantity`, `flag`, `AffiliateLink`) VALUES
('9780137314911', 'Modern Software Engineering: An Engineering Discipline', 'David Farley', 'g2af0i9p.png', 'In Modern Software Engineering, continuous delivery pioneer David Farley helps software professionals think about their work more effectively, manage it more successfully, and genuinely improve the quality of their applications, their lives, and the lives of their colleagues.\r\n\r\nWriting for programmers, managers, and technical leads at all levels of experience, Farley illuminates durable principles at the heart of effective software development. He distills the discipline into two core exercises: learning and exploration and managing complexity. For each, he defines principles that can help you improve everything from your mindset to the quality of your code, and describes approaches proven to promote success.', '39.99', 28, 1, 'https://www.barnesandnoble.com/w/modern-software-engineering-david-farley/1138991032?ean=9780137314911');

INSERT INTO `books` (`book_isbn`, `book_title`, `book_author`, `book_image`, `book_descr`, `book_price`, `book_quantity`, `flag`, `AffiliateLink`) VALUES
('9780198758396', 'A New History of the Humanities', 'Rens Bod', 'fardj1tl.png', 'Many histories of science have been written, but A New History of the Humanities offers the first overarching history of the humanities from Antiquity to the present. There are already historical studies of musicology, logic, art history, linguistics, and historiography, but this volume gathers these, and many other humanities disciplines, into a single coherent account.\r\n\r\nIts central theme is the way in which scholars throughout the ages and in virtually all civilizations have sought to identify patterns in texts, art, music, languages, literature, and the past. What rules can we apply if we wish to determine whether a tale about the past is trustworthy? By what criteria are we to distinguish consonant from dissonant musical intervals? What rules jointly describe all possible.', '39.99', 17, 0, 'https://www.barnesandnoble.com/w/a-new-history-of-the-humanities-rens-bod/1124386656?ean=9780198758396'),
('9781449373320', 'Designing Data-Intensive Applications', 'Martin Kleppmann', '87b9roml.png', 'Data is at the center of many challenges in system design today. Difficult issues need to be figured out, such as scalability, consistency, reliability, efficiency, and maintainability. In addition, we have an overwhelming variety of tools, including relational databases, NoSQL datastores, stream or batch processors, and message brokers. What are the right choices for your application? How do you make sense of all these buzzwords?\r\nIn this practical and comprehensive guide, author Martin Kleppmann helps you navigate this diverse landscape by examining the pros and cons of various technologies for processing and storing data. Software keeps changing, but the fundamental principles remain the same.', '49.99', 6, 1, 'https://www.barnesandnoble.com/w/designing-data-intensive-applications-martin-kleppmann/1120626693?ean=9781449373320'),
('9781680507225', 'A Common-Sense Guide to Data Structures and Algorithms', 'Jay Wengrow', 'rvdrwo5f.png', 'Algorithms and data structures are much more than abstract concepts. Mastering them enables you to write code that runs faster and more efficiently, which is particularly important for todayââ?¬â?¢s web and mobile apps. Take a practical approach to data structures and algorithms, with techniques and real-world scenarios that you can use in your daily production code, with examples in JavaScript, Python, and Ruby. This new and revised second edition features new chapters on recursion, dynamic programming, and using Big O in your daily work.\r\nUse Big O notation to measure and articulate the efficiency of your code, and modify your algorithm to make it faster. Find out how your choice of arrays, linked lists, and hash tables can dramatically affect the code you write. Use recursion to solve tricky problems and create algorithms that run exponentially faster than the alternatives.', '45.00', 1, 0, 'https://www.barnesandnoble.com/w/a-common-sense-guide-to-data-structures-and-algorithms-second-edition-jay-wengrow/1134424548?ean=9781680507225'),
('9781990373961', 'Internet of Things: Building Predictive Maintenance Systems', 'Jose Blevins', 'zf45ysnw.png', 'Have you ever wondered how the technology that is shaping our world works?\r\n\r\nFrom mainstream technologies such as computing and the Internet, to emerging technologies such as artificial intelligence and quantum computing, it is no secret that the world is heavily influenced by technology. Yet, the technology that we depend upon is often not fully understood by those not specialized in the field.', '19.95', 10, 1, 'https://www.barnesandnoble.com/w/internet-of-things-jose-blevins/1143515818?ean=9781990373961');

ALTER TABLE books
  ADD PRIMARY KEY (book_isbn);


-- for admin
CREATE TABLE admin (
 name     VARCHAR(20) COLLATE latin1_general_ci NOT NULL,
 password    VARCHAR(40) COLLATE latin1_general_ci NOT NULL
);

DELIMITER //
CREATE TRIGGER hash_password_before_insert
BEFORE INSERT ON admin
FOR EACH ROW
BEGIN
    SET NEW.password = SHA1(NEW.password);
END;
//
DELIMITER ;

ALTER TABLE admin
  ADD PRIMARY KEY (name,password);

INSERT INTO admin (name, password) VALUES ('admin', 'admin');
