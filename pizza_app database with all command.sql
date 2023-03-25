--
-- PostgreSQL database dump
--

-- Dumped from database version 12.1
-- Dumped by pg_dump version 13.1

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: tbl_admin; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tbl_admin (
    full_name text,
    username text,
    password text,
    id integer NOT NULL
);


ALTER TABLE public.tbl_admin OWNER TO postgres;

--
-- Name: tbl_admin_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tbl_admin_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tbl_admin_id_seq OWNER TO postgres;

--
-- Name: tbl_admin_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tbl_admin_id_seq OWNED BY public.tbl_admin.id;


--
-- Name: tbl_category; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tbl_category (
    title text,
    image_name text,
    featured text,
    active text,
    id integer NOT NULL
);


ALTER TABLE public.tbl_category OWNER TO postgres;

--
-- Name: tbl_category_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tbl_category_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tbl_category_id_seq OWNER TO postgres;

--
-- Name: tbl_category_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tbl_category_id_seq OWNED BY public.tbl_category.id;


--
-- Name: tbl_customer; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tbl_customer (
    id integer NOT NULL,
    full_name text,
    username text,
    password text,
    email text,
    mobile text,
    address text
);


ALTER TABLE public.tbl_customer OWNER TO postgres;

--
-- Name: tbl_customer_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tbl_customer_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tbl_customer_id_seq OWNER TO postgres;

--
-- Name: tbl_customer_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tbl_customer_id_seq OWNED BY public.tbl_customer.id;


--
-- Name: tbl_food; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tbl_food (
    title text,
    description text,
    price numeric,
    image_name text,
    category_id smallint,
    featured character(3),
    active character(3),
    id integer NOT NULL
);


ALTER TABLE public.tbl_food OWNER TO postgres;

--
-- Name: tbl_food_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tbl_food_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tbl_food_id_seq OWNER TO postgres;

--
-- Name: tbl_food_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tbl_food_id_seq OWNED BY public.tbl_food.id;


--
-- Name: tbl_ingridients; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tbl_ingridients (
    name text,
    category text,
    status text,
    id text NOT NULL
);


ALTER TABLE public.tbl_ingridients OWNER TO postgres;

--
-- Name: tbl_ingridients_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tbl_ingridients_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tbl_ingridients_id_seq OWNER TO postgres;

--
-- Name: tbl_ingridients_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tbl_ingridients_id_seq OWNED BY public.tbl_ingridients.id;


--
-- Name: tbl_myp_order; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tbl_myp_order (
    price text,
    order_date text,
    status text,
    customer_name text,
    customer_contact text,
    customer_email text,
    customer_address text,
    id integer NOT NULL,
    ingridients text
);


ALTER TABLE public.tbl_myp_order OWNER TO postgres;

--
-- Name: tbl_myp_order_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tbl_myp_order_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tbl_myp_order_id_seq OWNER TO postgres;

--
-- Name: tbl_myp_order_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tbl_myp_order_id_seq OWNED BY public.tbl_myp_order.id;


--
-- Name: tbl_order; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tbl_order (
    food text,
    price integer,
    qty smallint,
    total integer,
    order_date text,
    status text,
    customer_name text,
    customer_contact text,
    customer_email text,
    customer_address text,
    id integer NOT NULL
);


ALTER TABLE public.tbl_order OWNER TO postgres;

--
-- Name: tbl_order_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tbl_order_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tbl_order_id_seq OWNER TO postgres;

--
-- Name: tbl_order_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tbl_order_id_seq OWNED BY public.tbl_order.id;


--
-- Name: tbl_supplier; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tbl_supplier (
    id integer NOT NULL,
    username text,
    password text,
    full_name text,
    category text
);


ALTER TABLE public.tbl_supplier OWNER TO postgres;

--
-- Name: tbl_supplier_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tbl_supplier_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tbl_supplier_id_seq OWNER TO postgres;

--
-- Name: tbl_supplier_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tbl_supplier_id_seq OWNED BY public.tbl_supplier.id;


--
-- Name: tbl_admin id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_admin ALTER COLUMN id SET DEFAULT nextval('public.tbl_admin_id_seq'::regclass);


--
-- Name: tbl_category id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_category ALTER COLUMN id SET DEFAULT nextval('public.tbl_category_id_seq'::regclass);


--
-- Name: tbl_customer id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_customer ALTER COLUMN id SET DEFAULT nextval('public.tbl_customer_id_seq'::regclass);


--
-- Name: tbl_food id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_food ALTER COLUMN id SET DEFAULT nextval('public.tbl_food_id_seq'::regclass);


--
-- Name: tbl_ingridients id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_ingridients ALTER COLUMN id SET DEFAULT nextval('public.tbl_ingridients_id_seq'::regclass);


--
-- Name: tbl_myp_order id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_myp_order ALTER COLUMN id SET DEFAULT nextval('public.tbl_myp_order_id_seq'::regclass);


--
-- Name: tbl_order id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_order ALTER COLUMN id SET DEFAULT nextval('public.tbl_order_id_seq'::regclass);


--
-- Name: tbl_supplier id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_supplier ALTER COLUMN id SET DEFAULT nextval('public.tbl_supplier_id_seq'::regclass);


--
-- Data for Name: tbl_admin; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.tbl_admin VALUES ('shuvo', 'shuvo4447', '6fd6b030c6afec018415662d0db43f9d', 1);


--
-- Data for Name: tbl_category; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.tbl_category VALUES ('Chicken Pizza', 'Food_Category_749.jpg', 'Yes', 'Yes', 1);
INSERT INTO public.tbl_category VALUES ('Vegitable Pizza', 'Food_Category_388.jpg', 'Yes', 'Yes', 3);
INSERT INTO public.tbl_category VALUES ('Beef Pizza', 'Food_Category_218.jpg', 'Yes', 'Yes', 2);


--
-- Data for Name: tbl_customer; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.tbl_customer VALUES (1, 'Md Faysal', 'shuvo4447', '6fd6b030c6afec018415662d0db43f9d', 'roslinshuvo@gmail.com', '07661221939', 'Zollikoferstraße 28');


--
-- Data for Name: tbl_food; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.tbl_food VALUES ('Grilled Veggie Pizza', 'Ingredients

8 small fresh mushrooms, halved

1 small zucchini, cut into 1/4-inch slices

1 small sweet yellow pepper, sliced

1 small sweet red pepper, sliced

1 small onion, sliced

1 tablespoon white wine vinegar

1 tablespoon water

4 teaspoons olive oil, divided

2 teaspoons minced fresh basil or 1/2 teaspoon dried basil

1/4 teaspoon salt

1/4 teaspoon pepper



', 10, 'product-1984.jpg', 3, 'Yes', 'Yes', 2);
INSERT INTO public.tbl_food VALUES ('Spicy Nacho Beef Pizza', 'For those who like the heat, this spicy pizza combines your favorite nacho flavors on crispy dough.

Ingredients

1 pound Ground Beef (75% to 80% lean)

1/4 teaspoon salt

1 to 2 tablespoons finely chopped pickled jalapeño pepper slices

3/4 cup prepared thick-and-chunky salsa

1 package (14 to 16 ounces) thick or thin prebaked pizza crust', 2, 'product-3375.jpg', 2, 'Yes', 'Yes', 1);
INSERT INTO public.tbl_food VALUES ('Garlic Chicken Pizza', 'Pizza night is made easy with this flavorful chicken and two-cheese pizza.

Ingredients

2 tablespoons Land O Lakes® Butter

1 teaspoon finely chopped fresh garlic

1/2 pound boneless skinless chicken breasts, cut into bite-sized pieces

1 (12-inch) prepared thin pizza crust

1/2 cup baby spinach leaves', 10, 'product-9048.jpg', 1, 'Yes', 'Yes', 4);


--
-- Data for Name: tbl_ingridients; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.tbl_ingridients VALUES ('onion', 'Stuffing', 'Enable', 'ingridient_6022cf91b27a4');
INSERT INTO public.tbl_ingridients VALUES ('Cherry Tomatoes', 'Vegetables', 'Enable', 'ingridient_6022cfc3f1634');
INSERT INTO public.tbl_ingridients VALUES ('black pepper', 'Spices', 'Enable', 'ingridient_6022cf53a921c');


--
-- Data for Name: tbl_myp_order; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.tbl_myp_order VALUES ('100', '2021-02-09 06:22:14pm', 'On Delivery', 'Md Faysal', '07661221939', 'roslinshuvo@gmail.com', 'Zollikoferstraße 28', 1, 'SPICES - [ black pepper, ]<br><br>STUFFING - [ onion, ]<br><br>VEGETABLES - [ Cherry Tomatoes, ]<br><br>');


--
-- Data for Name: tbl_order; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.tbl_order VALUES ('Garlic Chicken Pizza', 12, 1, 12, '2021-02-09 06:23:30pm', 'On Delivery', 'Md Faysal', '07661221939', 'roslinshuvo@gmail.com', 'Zollikoferstraße 28', 1);


--
-- Data for Name: tbl_supplier; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.tbl_supplier VALUES (2, 'shuvo', 'e10adc3949ba59abbe56e057f20f883e', 'shuvo', 'Stuffing');
INSERT INTO public.tbl_supplier VALUES (3, 'new', 'e10adc3949ba59abbe56e057f20f883e', 'New Supplier', 'Vegetables');
INSERT INTO public.tbl_supplier VALUES (1, 'sharif', 'e10adc3949ba59abbe56e057f20f883e', 'sharif4', 'Spices');


--
-- Name: tbl_admin_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tbl_admin_id_seq', 1, true);


--
-- Name: tbl_category_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tbl_category_id_seq', 3, true);


--
-- Name: tbl_customer_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tbl_customer_id_seq', 1, true);


--
-- Name: tbl_food_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tbl_food_id_seq', 4, true);


--
-- Name: tbl_ingridients_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tbl_ingridients_id_seq', 1, false);


--
-- Name: tbl_myp_order_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tbl_myp_order_id_seq', 1, true);


--
-- Name: tbl_order_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tbl_order_id_seq', 1, true);


--
-- Name: tbl_supplier_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tbl_supplier_id_seq', 3, true);


--
-- PostgreSQL database dump complete
--

