<script src="./front/SpryAssets/SpryTabbedPanels.js" type="text/javascript"></script>
<link href="./front/SpryAssets/SpryTabbedPanels.css" rel="stylesheet" type="text/css" />

<h1 style="font-size:100px; font-weight:700; ">NEWS</h1>
<div id="TabbedPanels1" class="TabbedPanels">
    <ul class="TabbedPanelsTabGroup">
        <li class="TabbedPanelsTab" tabindex="0" style="font-size: 20px;">國際</li>
        <li class="TabbedPanelsTab" tabindex="0" style="font-size: 20px;">中國</li>
        <li class="TabbedPanelsTab" tabindex="0" style="font-size: 20px;">金融市場</li>
        <li class="TabbedPanelsTab" tabindex="0" style="font-size: 20px;">經濟</li>
        <li class="TabbedPanelsTab" tabindex="0" style="font-size: 20px;">商業</li>
        <li class="TabbedPanelsTab" tabindex="0" style="font-size: 20px;">科技</li>
        <li class="TabbedPanelsTab" tabindex="0" style="font-size: 20px;">專欄</li>
    </ul>
    <div class="TabbedPanelsContentGroup" style="font-size:20px;">
        <div class="TabbedPanelsContent">
            <?php
            $subjects = $News->all(['type' => 1, 'sh'=>1, 'sh'=>1]);
            ?>
            <table>
                <tr>
                    <th style="padding: 10px;">編號</th>
                    <th style="padding: 10px;">標題</th>
                    <th style="padding: 10px;">點閱數</th>
                </tr>
                <?php
                foreach ($subjects as $key => $subject) {
                ?>
                    <tr>
                        <td style="width: 15%;text-align: center">
                            <?= $key + 1; ?>
                        </td>
                        <td style="text-align:left;">
                            <a href="index.php?do=readed_news&id=<?= $subject['id']; ?>" style="text-align:left; width: 30%;text-decoration:none">
                                <?= $subject['title']; ?>
                            </a>
                        </td>
                        <td style="width: 15%;text-align: center">
                        <?= $subject['readed']; ?>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </table>

        </div>
        <div class="TabbedPanelsContent">
            <?php
            $subjects = $News->all(['type' => 2, 'sh'=>1]);
            ?>
            <table>
                <tr>
                    <th style="padding: 10px;">編號</th>
                    <th style="padding: 10px;">標題</th>

                </tr>
                <?php
                foreach ($subjects as $key => $subject) {
                ?>
                    <tr>
                        <td style="width: 15%;text-align: center">
                            <?= $key + 1; ?>
                        </td>
                        <td style="text-align:left;">
                            <a href="index.php?do=readed_news&id=<?= $subject['id']; ?>" style="text-align:left; width: 30%;text-decoration:none">
                                <?= $subject['title']; ?>
                            </a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
        <div class="TabbedPanelsContent">
            <?php
            $subjects = $News->all(['type' => 3, 'sh'=>1]);
            ?>
            <table>
                <tr>
                    <th style="padding: 10px;">編號</th>
                    <th style="padding: 10px;">標題</th>
                </tr>
                <?php
                foreach ($subjects as $key => $subject) {
                ?>
                    <tr>
                        <td style="width: 15%;text-align: center">
                            <?= $key + 1; ?>
                        </td>
                        <td style="text-align:left;">
                            <a href="index.php?do=readed_news&id=<?= $subject['id']; ?>" style="text-align:left; width: 30%;text-decoration:none">
                                <?= $subject['title']; ?>
                            </a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
        <div class="TabbedPanelsContent">
            <?php
            $subjects = $News->all(['type' => 4, 'sh'=>1]);
            ?>
            <table>
                <tr>
                    <th style="padding: 10px;">編號</th>
                    <th style="padding: 10px;">標題</th>

                </tr>
                <?php
                foreach ($subjects as $key => $subject) {
                ?>
                    <tr>
                        <td style="width: 15%;text-align: center">
                            <?= $key + 1; ?>
                        </td>
                        <td style="text-align:left;">
                            <a href="index.php?do=readed_news&id=<?= $subject['id']; ?>" style="text-align:left; width: 30%;text-decoration:none">
                                <?= $subject['title']; ?>
                            </a>
                        </td>


                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
        <div class="TabbedPanelsContent">
            <?php
            $subjects = $News->all(['type' => 5, 'sh'=>1]);
            ?>
            <table>
                <tr>
                    <th style="padding: 10px;">編號</th>
                    <th style="padding: 10px;">標題</th>

                </tr>
                <?php
                foreach ($subjects as $key => $subject) {
                ?>
                    <tr>
                        <td style="width: 15%;text-align: center">
                            <?= $key + 1; ?>
                        </td>
                        <td style="text-align:left;">
                            <a href="index.php?do=readed_news&id=<?= $subject['id']; ?>" style="text-align:left; width: 30%;text-decoration:none">
                                <?= $subject['title']; ?>
                            </a>
                        </td>


                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
        <div class="TabbedPanelsContent">
            <?php
            $subjects = $News->all(['type' => 6, 'sh'=>1]);
            ?>
            <table>
                <tr>
                    <th style="padding: 10px;">編號</th>
                    <th style="padding: 10px;">標題</th>

                </tr>
                <?php
                foreach ($subjects as $key => $subject) {
                ?>
                    <tr>
                        <td style="width: 15%;text-align: center">
                            <?= $key + 1; ?>
                        </td>
                        <td style="text-align:left;">
                            <a href="index.php?do=readed_news&id=<?= $subject['id']; ?>" style="text-align:left; width: 30%;text-decoration:none">
                                <?= $subject['title']; ?>
                            </a>
                        </td>


                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
        <div class="TabbedPanelsContent">
            <?php
            $subjects = $News->all(['type' => 7, 'sh'=>1]);
            ?>
            <table>
                <tr>
                    <th style="padding: 10px;">編號</th>
                    <th style="padding: 10px;">標題</th>

                </tr>
                <?php
                foreach ($subjects as $key => $subject) {
                ?>
                    <tr>
                        <td style="width: 15%;text-align: center">
                            <?= $key + 1; ?>
                        </td>
                        <td style="text-align:left;">
                            <a href="index.php?do=readed_news&id=<?= $subject['id']; ?>" style="text-align:left; width: 30%;text-decoration:none">
                                <?= $subject['title']; ?>
                            </a>
                        </td>


                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
        
    </div>
</div>
<script type="text/javascript">
    var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");
</script>