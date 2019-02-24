-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2019 at 09:18 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `faltas`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `apelido` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `nome`, `apelido`, `email`, `password`) VALUES
(1, 'Administrador', 'Default', 'Admin@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(2, 'Fernando', 'de Sousa', 'Administrador@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Table structure for table `cadeira`
--

CREATE TABLE `cadeira` (
  `ID` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `fk_id_docente` int(11) NOT NULL,
  `fk_id_curso` int(11) NOT NULL,
  `fk_id_turma` int(11) NOT NULL,
  `max_faltas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cadeira`
--

INSERT INTO `cadeira` (`ID`, `nome`, `fk_id_docente`, `fk_id_curso`, `fk_id_turma`, `max_faltas`) VALUES
(1, 'Praticas de IT', 2, 1, 1, 7),
(2, 'MatemÃ¡tica', 1, 2, 2, 10),
(3, 'ICDL', 2, 2, 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `coordenador`
--

CREATE TABLE `coordenador` (
  `ID` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `apelido` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fk_id_curso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `coordenador`
--

INSERT INTO `coordenador` (`ID`, `nome`, `apelido`, `email`, `password`, `fk_id_curso`) VALUES
(1, 'Coordenador', 'Para Testes', 'Coordenador@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 1),
(2, 'Coordenador ', 'Economia', 'Economia@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 2);

-- --------------------------------------------------------

--
-- Table structure for table `curso`
--

CREATE TABLE `curso` (
  `ID` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `curso`
--

INSERT INTO `curso` (`ID`, `nome`) VALUES
(1, 'Tecnologias de informacao'),
(2, 'Economia e Gestao');

-- --------------------------------------------------------

--
-- Table structure for table `docente`
--

CREATE TABLE `docente` (
  `ID` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `apelido` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `docente`
--

INSERT INTO `docente` (`ID`, `nome`, `email`, `password`, `apelido`) VALUES
(1, 'Docente', 'Docente@gmail.com', 'f25b8258b6f0865c460ce3107d6f0116', 'Para Testes'),
(2, 'Aniza', 'Aniza@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Faquira');

-- --------------------------------------------------------

--
-- Table structure for table `estudante`
--

CREATE TABLE `estudante` (
  `ID` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(150) NOT NULL,
  `apelido` varchar(100) NOT NULL,
  `fk_id_curso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `estudante`
--

INSERT INTO `estudante` (`ID`, `nome`, `email`, `password`, `apelido`, `fk_id_curso`) VALUES
(1, 'Kelven ', 'kelveninayatt@gmail.com', 'f36a7e912a08c13b94389b91f7cb5acc', 'de Sousa', 1),
(2, 'Harold', 'Harold@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Mendes', 1),
(3, 'Carlos', 'Carlos@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Hilario', 1),
(4, 'Patricia', 'Patricia@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Gaspar', 2),
(5, 'Ilidio', 'Ilidio@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Pondeca', 2),
(6, 'Silher', 'Silher@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'asseg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `falta`
--

CREATE TABLE `falta` (
  `ID` int(11) NOT NULL,
  `Data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fk_id_docente` int(11) NOT NULL,
  `fk_id_curso` int(11) NOT NULL,
  `fk_id_turma` int(11) NOT NULL,
  `fk_id_estudante` int(11) NOT NULL,
  `fk_id_cadeira` int(11) NOT NULL,
  `fk_id_lista` int(11) NOT NULL,
  `estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `falta`
--

INSERT INTO `falta` (`ID`, `Data`, `fk_id_docente`, `fk_id_curso`, `fk_id_turma`, `fk_id_estudante`, `fk_id_cadeira`, `fk_id_lista`, `estado`) VALUES
(1, '2018-11-07 08:42:55', 2, 1, 1, 1, 1, 1, 'NÃ£o justificada'),
(2, '2018-11-07 08:47:36', 2, 1, 1, 3, 1, 1, 'Justificada'),
(3, '2018-11-07 08:43:36', 2, 2, 2, 4, 3, 2, 'NÃ£o justificada'),
(4, '2018-11-07 08:43:37', 2, 2, 2, 5, 3, 2, 'NÃ£o justificada'),
(5, '2018-11-07 08:43:37', 2, 2, 2, 6, 3, 2, 'NÃ£o justificada');

-- --------------------------------------------------------

--
-- Table structure for table `justificacao`
--

CREATE TABLE `justificacao` (
  `ID` int(11) NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `comprovativo` varchar(300) NOT NULL,
  `estado` varchar(150) NOT NULL,
  `fk_id_estudante` int(11) NOT NULL,
  `fk_id_falta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `justificacao`
--

INSERT INTO `justificacao` (`ID`, `data`, `comprovativo`, `estado`, `fk_id_estudante`, `fk_id_falta`) VALUES
(1, '2018-11-07 08:47:36', 'comprovativos/Trabalho 1.docx', 'justificada', 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `lista_estudantes_cadeira`
--

CREATE TABLE `lista_estudantes_cadeira` (
  `ID` int(11) NOT NULL,
  `fk_id_curso` int(11) NOT NULL,
  `fk_id_cadeira` int(11) NOT NULL,
  `fk_id_turma` int(11) NOT NULL,
  `fk_id_estudante` int(11) NOT NULL,
  `ano_lectivo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lista_estudantes_cadeira`
--

INSERT INTO `lista_estudantes_cadeira` (`ID`, `fk_id_curso`, `fk_id_cadeira`, `fk_id_turma`, `fk_id_estudante`, `ano_lectivo`) VALUES
(1, 1, 1, 1, 1, 2019),
(2, 1, 1, 1, 2, 2019),
(3, 1, 1, 1, 3, 2019),
(4, 2, 2, 2, 4, 2019),
(5, 2, 2, 2, 5, 2019),
(6, 2, 3, 2, 4, 2019),
(7, 2, 3, 2, 5, 2019),
(8, 2, 3, 2, 6, 2019);

-- --------------------------------------------------------

--
-- Table structure for table `lista_presenca`
--

CREATE TABLE `lista_presenca` (
  `ID` int(11) NOT NULL,
  `fk_id_curso` int(11) NOT NULL,
  `fk_id_cadeira` int(11) NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fk_id_docente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lista_presenca`
--

INSERT INTO `lista_presenca` (`ID`, `fk_id_curso`, `fk_id_cadeira`, `data`, `fk_id_docente`) VALUES
(1, 1, 1, '2018-11-07 08:42:55', 2),
(2, 2, 3, '2018-11-07 08:43:36', 2);

-- --------------------------------------------------------

--
-- Table structure for table `turma`
--

CREATE TABLE `turma` (
  `ID` int(11) NOT NULL,
  `turno` varchar(50) NOT NULL,
  `ano` int(11) NOT NULL,
  `fk_id_curso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `turma`
--

INSERT INTO `turma` (`ID`, `turno`, `ano`, `fk_id_curso`) VALUES
(1, 'Diurno', 1, 1),
(2, 'Diurno', 2, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `cadeira`
--
ALTER TABLE `cadeira`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_id_docente` (`fk_id_docente`),
  ADD KEY `fk_id_curso` (`fk_id_curso`),
  ADD KEY `fk_id_turma` (`fk_id_turma`);

--
-- Indexes for table `coordenador`
--
ALTER TABLE `coordenador`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_id_curso` (`fk_id_curso`);

--
-- Indexes for table `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `docente`
--
ALTER TABLE `docente`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `estudante`
--
ALTER TABLE `estudante`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_id_curso` (`fk_id_curso`);

--
-- Indexes for table `falta`
--
ALTER TABLE `falta`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_id_docente` (`fk_id_docente`),
  ADD KEY `fk_id_curso` (`fk_id_curso`),
  ADD KEY `fk_id_turma` (`fk_id_turma`),
  ADD KEY `fk_id_estudante` (`fk_id_estudante`),
  ADD KEY `fk_id_cadeira` (`fk_id_cadeira`),
  ADD KEY `fk_id_lista` (`fk_id_lista`);

--
-- Indexes for table `justificacao`
--
ALTER TABLE `justificacao`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_id_estudante` (`fk_id_estudante`),
  ADD KEY `fk_id_falta` (`fk_id_falta`);

--
-- Indexes for table `lista_estudantes_cadeira`
--
ALTER TABLE `lista_estudantes_cadeira`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_id_curso` (`fk_id_curso`),
  ADD KEY `fk_id_cadeira` (`fk_id_cadeira`),
  ADD KEY `fk_id_turma` (`fk_id_turma`),
  ADD KEY `fk_id_estudante` (`fk_id_estudante`);

--
-- Indexes for table `lista_presenca`
--
ALTER TABLE `lista_presenca`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_id_curso` (`fk_id_curso`),
  ADD KEY `fk_id_cadeira` (`fk_id_cadeira`),
  ADD KEY `fk_id_docente` (`fk_id_docente`);

--
-- Indexes for table `turma`
--
ALTER TABLE `turma`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_id_curso` (`fk_id_curso`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cadeira`
--
ALTER TABLE `cadeira`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `coordenador`
--
ALTER TABLE `coordenador`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `curso`
--
ALTER TABLE `curso`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `docente`
--
ALTER TABLE `docente`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `estudante`
--
ALTER TABLE `estudante`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `falta`
--
ALTER TABLE `falta`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `justificacao`
--
ALTER TABLE `justificacao`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lista_estudantes_cadeira`
--
ALTER TABLE `lista_estudantes_cadeira`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `lista_presenca`
--
ALTER TABLE `lista_presenca`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `turma`
--
ALTER TABLE `turma`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cadeira`
--
ALTER TABLE `cadeira`
  ADD CONSTRAINT `Cadeira_ibfk_1` FOREIGN KEY (`fk_id_docente`) REFERENCES `docente` (`ID`),
  ADD CONSTRAINT `Cadeira_ibfk_2` FOREIGN KEY (`fk_id_curso`) REFERENCES `curso` (`ID`);

--
-- Constraints for table `coordenador`
--
ALTER TABLE `coordenador`
  ADD CONSTRAINT `Coordenador_ibfk_1` FOREIGN KEY (`fk_id_curso`) REFERENCES `curso` (`ID`);

--
-- Constraints for table `estudante`
--
ALTER TABLE `estudante`
  ADD CONSTRAINT `Estudante_ibfk_1` FOREIGN KEY (`fk_id_curso`) REFERENCES `curso` (`ID`);

--
-- Constraints for table `falta`
--
ALTER TABLE `falta`
  ADD CONSTRAINT `Falta_ibfk_1` FOREIGN KEY (`fk_id_curso`) REFERENCES `curso` (`ID`),
  ADD CONSTRAINT `Falta_ibfk_2` FOREIGN KEY (`fk_id_turma`) REFERENCES `turma` (`ID`),
  ADD CONSTRAINT `Falta_ibfk_3` FOREIGN KEY (`fk_id_estudante`) REFERENCES `estudante` (`ID`),
  ADD CONSTRAINT `Falta_ibfk_4` FOREIGN KEY (`fk_id_cadeira`) REFERENCES `cadeira` (`ID`),
  ADD CONSTRAINT `Falta_ibfk_6` FOREIGN KEY (`fk_id_docente`) REFERENCES `docente` (`ID`),
  ADD CONSTRAINT `Falta_ibfk_7` FOREIGN KEY (`fk_id_lista`) REFERENCES `lista_presenca` (`ID`);

--
-- Constraints for table `justificacao`
--
ALTER TABLE `justificacao`
  ADD CONSTRAINT `Justificacao_ibfk_1` FOREIGN KEY (`fk_id_estudante`) REFERENCES `estudante` (`ID`),
  ADD CONSTRAINT `Justificacao_ibfk_2` FOREIGN KEY (`fk_id_falta`) REFERENCES `falta` (`ID`);

--
-- Constraints for table `lista_estudantes_cadeira`
--
ALTER TABLE `lista_estudantes_cadeira`
  ADD CONSTRAINT `Lista_estudantes_cadeira_ibfk_1` FOREIGN KEY (`fk_id_curso`) REFERENCES `curso` (`ID`),
  ADD CONSTRAINT `Lista_estudantes_cadeira_ibfk_2` FOREIGN KEY (`fk_id_cadeira`) REFERENCES `cadeira` (`ID`),
  ADD CONSTRAINT `Lista_estudantes_cadeira_ibfk_3` FOREIGN KEY (`fk_id_turma`) REFERENCES `turma` (`ID`),
  ADD CONSTRAINT `Lista_estudantes_cadeira_ibfk_4` FOREIGN KEY (`fk_id_estudante`) REFERENCES `estudante` (`ID`);

--
-- Constraints for table `lista_presenca`
--
ALTER TABLE `lista_presenca`
  ADD CONSTRAINT `Lista_presenca_ibfk_1` FOREIGN KEY (`fk_id_curso`) REFERENCES `curso` (`ID`),
  ADD CONSTRAINT `Lista_presenca_ibfk_2` FOREIGN KEY (`fk_id_cadeira`) REFERENCES `cadeira` (`ID`),
  ADD CONSTRAINT `Lista_presenca_ibfk_3` FOREIGN KEY (`fk_id_docente`) REFERENCES `docente` (`ID`);

--
-- Constraints for table `turma`
--
ALTER TABLE `turma`
  ADD CONSTRAINT `Turma_ibfk_1` FOREIGN KEY (`fk_id_curso`) REFERENCES `curso` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
