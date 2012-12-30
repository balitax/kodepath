	
		<!-- TextboxList is not priceless for commercial use. See <http://devthought.com/projects/mootools/textboxlist/> -->
		
		<!-- required stylesheet for TextboxList -->
		<link rel="stylesheet" href="../Source/TextboxList.css" type="text/css" media="screen" charset="utf-8" />
		<!-- required stylesheet for TextboxList.Autocomplete -->
		<link rel="stylesheet" href="../Source/TextboxList.Autocomplete.css" type="text/css" media="screen" charset="utf-8" />
		<!--start textbox-->
		<script src="mootools-1.2.1-core-yc.js" type="text/javascript" charset="utf-8"></script>		

		<!-- required for TextboxList -->
		<script src="GrowingInput.js" type="text/javascript" charset="utf-8"></script>
		<script src="../Source/TextboxList.js" type="text/javascript" charset="utf-8"></script>		
		<script src="../Source/TextboxList.Autocomplete.js" type="text/javascript" charset="utf-8"></script>
		<!-- required for TextboxList.Autocomplete if method set to 'binary' -->
		<script src="../Source/TextboxList.Autocomplete.Binary.js" type="text/javascript" charset="utf-8"></script>		
		
		<!-- sample initialization -->
		<script type="text/javascript" charset="utf-8">		
			window.addEvent('load', function(){
				// Autocomplete initialization
				var tag = new TextboxList('form_tags_input_3', {unique: true, plugins: {autocomplete: {}}});
				tag.add('John Doe').add('Jane Gery');
				
				// sample data loading with json, but can be jsonp, local, etc. 
				// the only requirement is that you call setValues with an array of this format:
				// [
				//	[id, bit_plaintext (on which search is performed), bit_html (optional, otherwise plain_text is used), autocomplete_html (html for the item displayed in the autocomplete suggestions dropdown)]
				// ]
				// read autocomplete.php for a JSON response exmaple
				tag.container.addClass('textboxlist-loading');				
				new Request.JSON({url: 'autocomplete.php', onSuccess: function(r){
					tag.plugins['autocomplete'].setValues(r);
					tag.container.removeClass('textboxlist-loading');
				}}).send();			
			});
		</script>
		<!-- sample style -->
		<style type="text/css" media="screen">
			.form_tags { margin-bottom: 10px; }
			
			/* Setting widget width example */
			.textboxlist { width: 400px; }
			
			/* Preloader for autocomplete */
			.textboxlist-loading { background: url('images/spinner.gif') no-repeat 380px center; }
			
			/* Autocomplete results styling */
			.form_friends .textboxlist-autocomplete-result { overflow: hidden; zoom: 1; }
			.form_friends .textboxlist-autocomplete-result img { float: left; padding-right: 10px; }
			
			.note { color: #666; font-size: 90%; }
			#footer { margin: 50px; text-align: center; }
		</style>
		<form action="submit.php" method="post" accept-charset="utf-8">
			<div class="form_friends">
				<input type="text" name="tags" value="" id="form_tags_input_3" />
			</div>
			<button name="submit" value="submit" id="submit">Submit</button>
		</form>
