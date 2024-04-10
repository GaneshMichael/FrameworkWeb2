
CREATE TABLE IF NOT EXISTS 'users' (
    'id' INTEGER  NOT NULL,
    'firstName' varchar(255) NOT NULL,
    'lastName' varchar(255) NOT NULL,
    'email' varchar(255) NOT NULL,
    'password' varchar(255) NOT NULL,
    'role' varchar(255) NOT NULL,
    'status' tinyint(4) NOT NULL,
    'created_at' timestamp  DEFAULT current_timestamp,
    'updated_at' timestamp DEFAULT '0000-00-00 00:00:00',
    'updated_by'  timestamp DEFAULT '0000-00-00 00:00:00'

    PRIMARY KEY(id AUTOINCREMENT)
    );

CREATE TABLE IF NOT EXISTS 'cards' (
    'id' int(11) NOT NULL,
    'name' varchar(255) NOT NULL,
    'description' text NOT NULL,
    'power' int(11) NOT NULL,
    'defense' int(11) NOT NULL,
    'rarity' varchar(255) NOT NULL,
    'type' varchar(255) NOT NULL,
    'set' varchar(255) NOT NULL,
    'marketValue' int(11) NOT NULL,
    'created_at' timestamp DEFAULT current_timestamp,
    'updated_at' timestamp DEFAULT '0000-00-00 00:00:00',
    'updates_by' timestamp DEFAULT '0000-00-00 00:00:00'
    );

CREATE TABLE IF NOT EXISTS 'set' (
    'id' int(11) NOT NULL,
    'name' varchar(255) NOT NULL,
    'description' text NOT NULL
    );


-- INSERT INTO `users` (`email`, `password`, `firstName`, `lastName`, `role`, `status`, `created_at`, `updated_by`, `updated_at`) VALUES
-- ('test@test.nl', '$2y$10$0nEMgkhCer0hREevnP37weaQseCWwub2nB6RJb1BDqqQ526jurPsa', 'test', 'test', 'Free', 0, '2024-04-09 23:30:07', 0, '0000-00-00 00:00:00'),
-- ('premium@premium.nl', '$3y$10$0nEMgkhCer0hREevnP37weaQseCWwub2nB6RJb1BDqqQ526jurPsa', 'premium', 'premium', 'Premium', 0, '2024-04-09 22:30:07', 0, '0000-00-00 00:00:00'),
-- ('test2@test.nl', '$4y$10$0nEMgkhCer0hREevnP37weaQseCWwub2nB6RJb1BDqqQ526jurPsa', 'test2', 'test2', 'Free', 0, '2024-04-09 23:35:07', 0, '0000-00-00 00:00:00'),
-- ('admin@admin.nl', '$2y$10$0nEMgkhCer0hREevnP37weaQseCWwub2nB6RJb1BDqqQ526jurPsa', 'admin', 'admin', 'Beheerder', 0, '2024-04-09 23:31:03', 0, '0000-00-00 00:00:00'),