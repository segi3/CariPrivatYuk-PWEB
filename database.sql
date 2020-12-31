-- ! nama db: fp_pweb

-- tabel mentor
CREATE TABLE mentors (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    fullname VARCHAR(255) NOT NULL,
    address VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    path_htp VARCHAR(255) NOT NULL,
    path_foto  VARCHAR(255) NOT NULL
);

-- tabel user
CREATE TABLE users (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    fullname VARCHAR(255) NOT NULL,
    address VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);

-- tabel kategori
CREATE TABLE categories (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    title VARCHAR(255) NOT NULL,
    slug VARCHAR(255) NOT NULL
);

-- tabel privates
CREATE TABLE privates (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    title VARCHAR(255) NOT NULL,
    category_id INT UNSIGNED NOT NULL,
    mentor_id INT UNSIGNED NOT NULL,
    price_per_hour INT NOT NULL,
    method LONGTEXT NOT NULL,

    FOREIGN KEY (category_id) REFERENCES categories(id),
    FOREIGN KEY (mentor_id) REFERENCES mentors(id)
);

-- tabel private_enrolls
CREATE TABLE private_enrolls (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    user_id INT UNSIGNED NOT NULL,
    private_id INT UNSIGNED NOT NULL,
    total_hours INT NOT NULL,
    hours_done INT NOT NULL,

    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (private_id) REFERENCES privates(id)
);

-- tabel transactions
-- PVT/CT1/U2/4
CREATE TABLE transactions (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    invoice VARCHAR(16) NOT NULL,
    user_id INT UNSIGNED NOT NULL,
    private_id INT UNSIGNED NOT NULL,
    order_date DATETIME,
    purchase_date DATETIME,
    payload LONGTEXT NOT NULL,

    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (private_id) REFERENCES privates(id)
);