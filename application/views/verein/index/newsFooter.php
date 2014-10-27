    <div id="newsModal" class="modal">
        <div class="modalHeader">
            <h3>Newseditor</h3>
        </div>
        <form name="newsModalForm" onSubmit="saveNews()">
            <input id="newsModalTeaserId" type="hidden" />
            <div class="txt">
                <label for="newsModalHeadline">&Uuml;berschrift</label>
                <input id="newsModalHeadline" type="text" required />
            </div>
            <div class="txt">
                <label for="newsModalImage">Bild</label>
                <input id="newsModalImage" type="text" />
                <button onclick="return false;"><i class="fa fa-image fa-fw"></i> Bild ausw&auml;hlen</button>
            </div>
            <div class="txt">
                <label for="newsModalText">Text</label>
                <textarea id="newsModalText" type="text" cols="55" rows="20" required ></textarea>
            </div>
            <div class="btn clearfix">
                <button type="submit" onClick="saveNews(); return false;"><i class="fa fa-save fa-fw"></i> Speichern</button>
                <button class="close cancel"><i class="fa fa-remove fa-fw"></i> Abbruch</button>
            </div>
        </form>
    </div>
</div>