
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
    'updated_by'  timestamp DEFAULT '0000-00-00 00:00:00',

    PRIMARY KEY(id AUTOINCREMENT)
    );

CREATE TABLE IF NOT EXISTS 'cards' (
    'id' INTEGER NOT NULL,
    'name' varchar(255) NOT NULL,
    'description' text NOT NULL,
    'power' int(11) NOT NULL,
    'defense' int(11) NOT NULL,
    'rarity' varchar(255) NOT NULL,
    'type' varchar(255) NOT NULL,
    'cardSet' varchar(255) NOT NULL,
    'marketValue' int(11) NOT NULL,
    'created_at' timestamp DEFAULT current_timestamp,
    'updated_at' timestamp DEFAULT '0000-00-00 00:00:00',
    'updates_by' timestamp DEFAULT '0000-00-00 00:00:00',
    PRIMARY KEY(id AUTOINCREMENT)
    );

CREATE TABLE IF NOT EXISTS 'cardSet' (
    'id' INTEGER NOT NULL,
    'name' varchar(255) NOT NULL,
    'description' text NOT NULL,
    PRIMARY KEY(id AUTOINCREMENT)
    );

CREATE TABLE IF NOT EXISTS decks (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name varchar(255) NOT NULL,
    cards varchar(255) NOT NULL,
    user_id INTEGER NOT NULL,
    created_at timestamp DEFAULT current_timestamp,
    updated_at timestamp DEFAULT current_timestamp,

    FOREIGN KEY(user_id) REFERENCES users(id)
);

-- CREATE TABLE IF NOT EXISTS deck_cards (
--     deck_id INTEGER,
--     card_id INTEGER,
--     quantity INTEGER DEFAULT 1 CHECK (quantity <= 2),
--     FOREIGN KEY (deck_id) REFERENCES decks(id),
--     FOREIGN KEY (card_id) REFERENCES cards(id),
--     PRIMARY KEY (deck_id, card_id)
-- );