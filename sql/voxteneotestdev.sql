--
-- PostgreSQL database dump
--

-- Dumped from database version 9.1.4
-- Dumped by pg_dump version 9.1.4
-- Started on 2016-02-22 15:34:18

SET statement_timeout = 0;
SET client_encoding = 'SQL_ASCII';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- TOC entry 165 (class 3079 OID 11639)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 1870 (class 0 OID 0)
-- Dependencies: 165
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 164 (class 1259 OID 393145)
-- Dependencies: 5
-- Name: school; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE school (
    school_id integer NOT NULL,
    name character varying,
    address character varying,
    maximum_students_allowed integer,
    courses_yearly_fee double precision
);


ALTER TABLE public.school OWNER TO postgres;

--
-- TOC entry 163 (class 1259 OID 393143)
-- Dependencies: 164 5
-- Name: school_school_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE school_school_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.school_school_id_seq OWNER TO postgres;

--
-- TOC entry 1871 (class 0 OID 0)
-- Dependencies: 163
-- Name: school_school_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE school_school_id_seq OWNED BY school.school_id;


--
-- TOC entry 1872 (class 0 OID 0)
-- Dependencies: 163
-- Name: school_school_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('school_school_id_seq', 2, true);


--
-- TOC entry 162 (class 1259 OID 393134)
-- Dependencies: 5
-- Name: student; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE student (
    student_id integer NOT NULL,
    first_name character varying,
    last_name character varying,
    birthdate timestamp without time zone,
    school_id integer,
    picture character varying
);


ALTER TABLE public.student OWNER TO postgres;

--
-- TOC entry 161 (class 1259 OID 393132)
-- Dependencies: 5 162
-- Name: student_student_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE student_student_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.student_student_id_seq OWNER TO postgres;

--
-- TOC entry 1873 (class 0 OID 0)
-- Dependencies: 161
-- Name: student_student_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE student_student_id_seq OWNED BY student.student_id;


--
-- TOC entry 1874 (class 0 OID 0)
-- Dependencies: 161
-- Name: student_student_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('student_student_id_seq', 1, true);


--
-- TOC entry 1857 (class 2604 OID 393148)
-- Dependencies: 163 164 164
-- Name: school_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY school ALTER COLUMN school_id SET DEFAULT nextval('school_school_id_seq'::regclass);


--
-- TOC entry 1856 (class 2604 OID 393137)
-- Dependencies: 162 161 162
-- Name: student_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY student ALTER COLUMN student_id SET DEFAULT nextval('student_student_id_seq'::regclass);


--
-- TOC entry 1864 (class 0 OID 393145)
-- Dependencies: 164
-- Data for Name: school; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO school VALUES (1, 'School AB', 'Address AB', 20, 500);
INSERT INTO school VALUES (2, 'ABC', 'ABC', 10, 500);


--
-- TOC entry 1863 (class 0 OID 393134)
-- Dependencies: 162
-- Data for Name: student; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO student VALUES (1, 'Jhon', 'Titor', NULL, 1, NULL);


--
-- TOC entry 1861 (class 2606 OID 393153)
-- Dependencies: 164 164
-- Name: school_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY school
    ADD CONSTRAINT school_pkey PRIMARY KEY (school_id);


--
-- TOC entry 1859 (class 2606 OID 393142)
-- Dependencies: 162 162
-- Name: student_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY student
    ADD CONSTRAINT student_pkey PRIMARY KEY (student_id);


--
-- TOC entry 1862 (class 2606 OID 393154)
-- Dependencies: 162 1860 164
-- Name: student_school_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY student
    ADD CONSTRAINT student_school_id_fkey FOREIGN KEY (school_id) REFERENCES school(school_id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- TOC entry 1869 (class 0 OID 0)
-- Dependencies: 5
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


-- Completed on 2016-02-22 15:34:19

--
-- PostgreSQL database dump complete
--

