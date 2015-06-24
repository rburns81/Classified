<?php
/**
 * Created by PhpStorm.
 * User: Richard
 * Date: 3/28/2015
 * Time: 9:59 PM
 */
//TODO Add PDO commands to pull classified types
//TODO Add <select> list with classified types
require '../vendor/autoload.php';
$teaser = isset($teaser) ? $teaser : '';
$description = isset($description) ? $description : '';
$price = isset($price) ? $price : '';
$adOwner = isset($adOwner) ? $adOwner : '';
$contact1 = isset($contact1) ? $contact1 : '';
$contact2 = isset($contact2) ? $contact2 : '';
$id = isset($id) ? $id : '';
include '../src/ClassifiedAd.php';
include '../src/Database.php';
$conn = new classified\Database();
$db = $conn->makeDbConn();
$results = classified\DataFetcher::fetchTypes($db);
include 'header.php';
?>
        <form>
            <div class="form-group">
                <label for="type">Type of Ad</label>
                <select class="form-control" name="type" id="type">
                    <?php foreach($results as $result){
                        echo '<option value=' . $result['id'] . '>' . $result['description'] . '</option>';
                    } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="teaser">Teaser text</label>
                <input type="text" class="form-control" id="teaser" name="teaser"
                       placeholder="One-line description, will display in bold" value="<?php echo $teaser; ?>">
            </div>
            <div class="form-group">
                <label for="description">Ad description</label>
                <textarea class="form-control" id="description" name="description" rows="5"
                    placeholder="Main ad text here.  Use separate fields for name, price and contact info"
                    ><?php echo $description;?></textarea>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <div class="input-group">
                    <span class="input-group-addon">$</span>
                    <input class="form-control" id="price" name="price"
                           placeholder="Numbers only.  Script handles formatting"
                           value="<?php echo $price; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="adOwner">Ad Owner</label>
                <input type="text" class="form-control" id="adOwner" name="adOwner"
                       placeholder="Who is placing the ad" value="<?php echo $adOwner; ?>">
            </div>
            <div class="form-group">
                <label for="contact1">Contact 1</label>
                <input type="text" class="form-control" id="contact1" name="contact1"
                    placeholder="Required. Phone number or email" value="<?php echo $contact1; ?>">
            </div>
            <div class="form-group">
                <label for="contact2">Contact 2</label>
                <input type="text" class="form-control" id="contact2" name="contact2"
                    placeholder="Optional.  Phone number or email" value="<?php echo $contact2; ?>">
            </div>

            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <button type="submit" class="btn btn-default">Submit</button>
            <button type="reset" class="btn btn-danger">Reset Form</button>
        </form>
<?
include 'footer.php';