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
