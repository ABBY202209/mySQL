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
            $all = $News->count(['type' => 1]);
            // dd($all);
            $div = 4;
            $pages = ceil($all / $div);
            $now = $_GET['p'] ?? 1;
            $start = ($now - 1) * $div;
            $rows = $News->all(" limit $start , $div");
            $subjects = $News->all(['type' => 1]);
            ?>
            <table>
                <tr  >
                    <th style="padding: 10px;">編號</th>
                    <th style="padding: 10px;">標題</th>
                    
                </tr>
                <?php
                foreach ($rows as $key => $row) {
                ?>
                    <tr>
                        <td style="width: 15%;text-align: center">
                            <?= $key + 1; ?>
                        </td>
                        <td style="text-align:left;">
                            <a href="back.php?do=edit_news&id=<?= $row['id']; ?>" style="text-align:left; width: 30%;text-decoration:none">
                                <?= $row['title']; ?>
                            </a>
                        </td>
                        
                        
                    </tr>
                <?php
                }
                ?>
            </table>
            <div class="pages">
                        <?php
                        if ($pages > 1) {
                            if (($now - 1) > 0) {
                                $pre = $now - 1;
                                echo "<a href='index.php?do=news&p=$pre'><</a>";
                            }
                            for ($i = 1; $i <= $pages; $i++) {
                                $size = ($i == $now) ? "24px" : "16px";
                                echo "<a href='index.php?do=news&p=$i' style='font-size:$size'>$i</a>";
                            }
                            if (($now + 1) <= $pages) {
                                $next = $now + 1;
                                echo "<a href='index.php?do=news&p=$next'>></a>";
                            }
                        }
                        ?>
                    </div>
        </div>
        <div class="TabbedPanelsContent">

        </div>
        <div class="TabbedPanelsContent">

        </div>
        <div class="TabbedPanelsContent">

        </div>
        <div class="TabbedPanelsContent">

        </div>
        <div class="TabbedPanelsContent">

        </div>
        <div class="TabbedPanelsContent">

        </div>
        <div class="TabbedPanelsContent">

        </div>
    </div>
</div>
<script type="text/javascript">
    var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");
</script>