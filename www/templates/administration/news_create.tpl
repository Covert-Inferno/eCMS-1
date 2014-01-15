<form action="?module=news&action=saveNews" method="post" accept-charset="iso-8859-1">
    Titel: <input type="text" class="inputField" name="title" value="{$smarty.post.newsTitle}" style="width: 624px;" />
    <br />
    <br />
    <textarea id="editor1" name="news" rows="10" cols="82"></textarea>
    <script>
        // Replace the <textarea id="news"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace( 'news', {
            toolbar: 'Basic'
        });
    </script>
    <br />
    Kategorie:
    <select name="category" class="selectBox" style="width: 150px;">
        <option class="selectOption" value="1">Allgemein</option>
        <option class="selectOption" value="2">Intern</option>
    </select>
    <br />
    <br />
    <input type="submit" class="pushButton" name="save" value="News speichern" />&nbsp;&nbsp;<input type="button" class="pushButton" value="Vorschau" name="preview" />
</form>