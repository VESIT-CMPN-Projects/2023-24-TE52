-- Creating database for carbon footprint
create database carboneutral;
use carboneutral;

create table company_type (
	type_id varchar(4) primary key,
    type_name varchar(50)
);

create table company (
	c_id varchar(4) primary key,
    c_name varchar(20),
    employee_count numeric,
    city varchar(15),
    state varchar(20),
    country varchar(15),
    office_area numeric(10, 2),
    email varchar(50) unique,
    org_type varchar(4) references company_type(type_id),
    username varchar(20) unique,
    password text
);

create table questions (
	q_id varchar(4) primary key,
    question text,
    option1 varchar(30),
    value1 numeric,
    option2 varchar(30),
    value2 numeric,
    option3 varchar(30),
    value3 numeric,
    option4 varchar(30),
    value4 numeric,
    org_type varchar(4) references company_type(type_id),
    domain varchar(20) default 'General'
);

create table response (
	company_id varchar(4) references company(c_id),
    question_id varchar(4) references questions(q_id),
    response_value varchar(20),
    domain varchar(20) default 'General',
    primary key (company_id, question_id)
);

insert into company_type values ('T1', 'Paper & products manufacturer');
insert into company_type values ('T2', 'Clothing');
insert into company_type values ('T3', 'Restaurant');

-- Give SQL queries to insert following questions in the questions table.
-- 1. Which material is used for packaging? 
-- 2. How are the orders shipped? 
-- 3. What is action taken on leftovers? 
-- 4. What is the way food is offered to customers? 
-- 5. What type of water is used? 
-- 6. Where are the ingredients sourced from? 
insert into questions values ('q1', 'Which material is used for packaging?', 'Paper', 4, 'Glass', 3, 'Plastic', 2, 'Thermocol', 1, 'T3', 'Packaging');
insert into questions values ('q2', 'How are the orders shipped?', 'Walking or cycling', 4, '2 wheelers', 3, '4 wheelers', 2, 'Takeaways', 5, 'T3', 'Shipping');
insert into questions values ('q3', 'What is action taken on leftovers?', 'Donated', 4, 'Sold', 3, 'Distributed to employees', 2, 'Thrown', 1, 'T3', 'Waste management');
insert into questions values ('q4', 'What is the material of utensils in which food is offered to customers?', 'Metal', 4, 'Glass', 3, 'Plastic', 2, 'Thermocol', 1, 'T3', 'Resources');
insert into questions values ('q5', 'What type of water is used?', 'Tap water', 4, 'Bottled water', 3, 'Filtered water', 2, 'Rain water', 5, 'T3', 'Water usage');
insert into questions values ('q6', 'Where are the ingredients sourced from?', 'Local', 4, 'State', 3, 'Country', 2, 'Imported', 1, 'T3', 'Shipping');

-- Clothing
-- 1. Which material is used for packaging? 
-- 2. How are the orders shipped? 
-- 3. What is the hold on take-back programs? 
-- 4. Which dyes and chemicals are used for manufacturing of certain clothes? 
-- 5. How is the waste disposed? 
-- 6. Is there any use of renewable energy sources? 
insert into questions values ('q7', 'Which material is used for packaging?', 'Paper', 4, 'Glass', 3, 'Plastic', 2, 'Thermocol', 1, 'T2', 'Packaging');
insert into questions values ('q8', 'How are the orders shipped?', 'Walking or cycling', 4, '2 wheelers', 3, '4 wheelers', 2, 'Takeaways', 5, 'T2', 'Shipping');
insert into questions values ('q9', 'What is the hold on take-back programs? Where you use the clothes which people give back.', 'Yes, we support', 4, 'No', 1, 'Not sure', 2, 'Never thought of it', 1, 'T2', 'Waste management');
insert into questions values ('q10', 'Which dyes and chemicals are used for manufacturing of certain clothes?', 'Natural', 4, 'Synthetic', 3, 'Chemical', 2, 'None', 5, 'T2', 'Resources');
insert into questions values ('q11', 'How is the waste disposed?', 'Recycled', 4, 'Composted', 3, 'Donated', 3, 'Thrown', 1, 'T2', 'Waste management');
insert into questions values ('q12', 'Is there any use of renewable energy sources?', 'Yes', 4, 'No', 1, 'Not sure', 2, 'Never thought of it', 1, 'T2', 'Energy usage');

-- Paper and paper products
-- 1. Which material is used for packaging? 
-- 2. How are the orders shipped? 
-- 3. Are the products made out of and given for recycling? 
-- 4. Is there any policy for minimising water usage in production? 
-- 5. What are the paper products made from? 
-- 6. Is there any promotion for sustainable programs?
insert into questions values ('q13', 'Which material is used for packaging?', 'Paper', 4, 'Board', 3, 'Plastic', 2, 'Thermocol', 1, 'T1', 'Packaging');
insert into questions values ('q14', 'How are the orders shipped?', 'E Vehicles', 4, 'Fuel based vehicles', 2, 'Ship / water ways', 2, 'Airways', 1, 'T1', 'Shipping');
insert into questions values ('q15', 'Are the products made out of recyled goods and also recycled back?', 'Yes', 4, 'No', 1, 'Not sure', 2, 'Never thought of it', 1, 'T1', 'Waste management');
insert into questions values ('q16', 'Is there any policy for minimising water usage in production?', 'Yes', 4, 'No', 1, 'Not sure', 2, 'Never thought of it', 1, 'T1', 'Water usage');
insert into questions values ('q17', 'What are the paper products made from?', 'Bamboo', 4, 'Temp', 3, 'Wood pulp', 2, 'Recycled', 5, 'T1', 'Resources');
insert into questions values ('q18', 'Is there any promotion for sustainable programs?', 'Yes', 4, 'No', 1, 'Not sure', 2, 'Never thought of it', 1, 'T1', 'General');