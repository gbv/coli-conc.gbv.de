<?php
$BASE = '../..';
include "$BASE/header.php";

// get list of software from csv file
$software = \League\Csv\Reader::createFromPath('software.csv', 'r');
$software->setHeaderOffset(0);

$status = [
    'production' => 'text-success',
    'prototype' => 'text-warning',
    'retired' => 'text-danger',
];
?>
<p>
  The following libraries and applications have been released as Open Source so far.
</p>
<table class="table sortable table-hover">
  <thead>
    <tr>
      <th>name and description</th>
      <th>status</th>
      <th></th>
      <th>language</th>
      <th>release</th>
    </tr>
  </thead>
<?php foreach($software->getRecords() as $s) { ?>
  <tr>
    <td>
      <a href="<?=$s['repository']?>"><?=$s['name']?></a>
      <?=htmlspecialchars($s['description'])?>
    </td>
    <td><?php
        $class = $status[$s['status']] ?? '';
        echo "<span class='$class'>{$s['status']}</span>";
    ?>
    </td>
    <td>
    <?php if ($s['travis']) {
        $url = str_replace('github.com','travis-ci.org',$s['repository']);
        echo "<a href='$url'><img src='$url.svg'></a>";
    } ?>
    </td>
    <td><?=$s['language']?></td>
    <td>
    <?php if ($s['release']) {
        list ($url, $shield)=[];
        if (preg_match('/^https?:/', $s['release'])) {
            $url = $s['release'];
        } elseif ($s['language']=='PHP') {
            $url = 'https://packagist.org/packages/';
            $shield = 'packagist';
        } elseif ($s['language']=='JavaScript') {
            $url = 'https://www.npmjs.com/package/';
            $shield = 'npm';
        } elseif ($s['language']=='Python') {
            $url = 'https://pypi.python.org/pypi/';
            $shield = 'pypi';
        } elseif ($s['language']=='Perl') {
            $url = 'https://metacpan.org/release/';
            $shield = 'cpan';
        } 
        if ($url) {
            if ($shield) {
              echo "<a href='$url{$s['release']}'>";
              echo "<img src='https://img.shields.io/$shield/v/{$s['release']}.svg?style=flat'/></a>";
            } else {
              echo "<a href='$url'>";
              echo "<span class='glyphicon glyphicon-arrow-right'/>";
            }
            echo "</a>";
        }
    } ?>
    </td>
  </tr>
<?php } ?>
</table>

<?php
include "$BASE/footer.php";
