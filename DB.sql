
CREATE TABLE IF NOT EXISTS 'users' (
    'id' int(11) NOT NULL,
    'name' varchar(255) NOT NULL,
    'lastname' varchar(255) NOT NULL,
    'email' varchar(255) NOT NULL,
    'password' varchar(255) NOT NULL,
    'role' varchar(255) NOT NULL,
    'status' tinyint(4) NOT NULL,
    'created_at',
    'updated_at',
    'updates_by'
    );


CREATE TABLE IF NOT EXISTS 'cards' (
    'id' int(11) NOT NULL,
    'name' varchar(255) NOT NULL,
    'description' text NOT NULL,
    'status' tinyint(4) NOT NULL,
    'created_at',
    'updated_at',
    'updates_by'
    );
