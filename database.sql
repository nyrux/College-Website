SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE actions (
  id int(11) NOT NULL,
  name text NOT NULL,
  image varchar(2000) NOT NULL,
  datetime datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

CREATE TABLE admissions_data (
  id int(11) NOT NULL,
  first_name varchar(50) NOT NULL,
  last_name varchar(50) NOT NULL,
  email varchar(100) NOT NULL,
  phone_number varchar(15) NOT NULL,
  province varchar(50) NOT NULL,
  course varchar(50) NOT NULL,
  dob date NOT NULL,
  grade varchar(10) NOT NULL,
  image varchar(255) NOT NULL,
  submitted_at timestamp NOT NULL DEFAULT current_timestamp(),
  status varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE codes (
  id int(6) NOT NULL,
  email varchar(255) NOT NULL,
  code int(10) NOT NULL,
  status varchar(50) NOT NULL,
  datetime datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

CREATE TABLE notices (
  id int(6) NOT NULL,
  title varchar(50) NOT NULL,
  start_date varchar(10) DEFAULT NULL,
  end_date varchar(10) DEFAULT NULL,
  image varchar(255) DEFAULT NULL,
  type varchar(50) NOT NULL,
  description text DEFAULT NULL,
  datetime timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

CREATE TABLE results (
  id int(11) NOT NULL,
  title varchar(250) NOT NULL,
  data text NOT NULL,
  grade varchar(5) NOT NULL,
  datetime datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

CREATE TABLE `routine` (
  id int(11) NOT NULL,
  data text NOT NULL,
  date varchar(60) NOT NULL,
  time timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

CREATE TABLE users (
  id int(11) NOT NULL,
  fullname varchar(255) NOT NULL,
  email varchar(255) NOT NULL,
  username varchar(255) NOT NULL,
  password varchar(255) NOT NULL,
  role varchar(50) DEFAULT NULL,
  date datetime NOT NULL DEFAULT current_timestamp(),
  status varchar(20) DEFAULT NULL,
  image varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


ALTER TABLE actions
  ADD PRIMARY KEY (id);

ALTER TABLE admissions_data
  ADD PRIMARY KEY (id);

ALTER TABLE codes
  ADD PRIMARY KEY (id);

ALTER TABLE notices
  ADD PRIMARY KEY (id);

ALTER TABLE results
  ADD PRIMARY KEY (id);

ALTER TABLE routine
  ADD PRIMARY KEY (id);

ALTER TABLE users
  ADD PRIMARY KEY (id);


ALTER TABLE actions
  MODIFY id int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE admissions_data
  MODIFY id int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE codes
  MODIFY id int(6) NOT NULL AUTO_INCREMENT;

ALTER TABLE notices
  MODIFY id int(6) NOT NULL AUTO_INCREMENT;

ALTER TABLE results
  MODIFY id int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE routine
  MODIFY id int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE users
  MODIFY id int(11) NOT NULL AUTO_INCREMENT;
