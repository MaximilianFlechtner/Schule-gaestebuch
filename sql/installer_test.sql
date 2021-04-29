DROP TABLE IF EXISTS `Guestbook`;
CREATE TABLE `Guestbook` (
                             `id` int(11) NOT NULL,
                             `name` text NOT NULL,
                             `email` text NOT NULL,
                             `website` text NOT NULL,
                             `text` text NOT NULL,
                             `gender` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Guestbook`
--

INSERT INTO `Guestbook` (`id`, `name`, `email`, `website`, `text`, `gender`) VALUES
(1, 'Medge Mcfadden', 'jetyku@mailinator.com', 'Elit esse pariatur', 'Et enim maiores alia', 'male'),
(2, 'Pamela Duffy', 'huhybupiva@mailinator.com', 'https://wsv-arendsee.de', 'Quis ipsa alias ut ', 'female'),
(3, 'Hop Flores', 'nicekyqyf@mailinator.com', 'https://wsv-arendsee.de', 'Quaerat debitis face', 'female'),
(4, 'Wendy Gutierrez', 'gizyzyh@mailinator.com', 'https://wsv-arendsee.de', 'Unde Nam adipisicing', 'female'),
(5, 'Iola Gray', 'hevocoh@mailinator.com', 'https://wsv-arendsee.de', 'Facilis sit rem vit ÄÄÄÄÄÄÄÄ', 'other'),
(6, 'Iola Gray', 'hevocoh@mailinator.com', 'https://wsv-arendsee.de', 'Facilis sit rem vit ÄÄÄÄÄÄÄÄ', 'other'),
(7, 'Britanney Camacho', 'pywal@mailinator.com', 'https://wsv-arendsee.de', 'ksjdhfkjsdhf', 'other'),
(8, 'Lesley Robles', 'xonypy@mailinator.com', 'https://wsv-arendsee.de', 'Voluptas molestiae v', 'other'),
(9, 'Kermit Meyer', 'qosilyloz@mailinator.com', 'https://wsv-arendsee.de', 'Eiusmod molestiae an', 'other'),
(10, 'Cherokee Beck', 'varekoqyki@mailinator.com', 'https://wsv-arendsee.de', 'Sequi similique quis', 'male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Guestbook`
--
ALTER TABLE `Guestbook`
    ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Guestbook`
--
ALTER TABLE `Guestbook`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
