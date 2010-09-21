<?php

class RCCWP_SWFUpload
{
	function Body($inputName, $fileType, $isCanvas = 0, $urlInputSize = false) {
		global $mf_domain;
		include_once('RCCWP_Options.php');
		
		$idField = RCCWP_WritePostPage::changeNameInput($inputName);

		if (!$urlInputSize) $urlInputSize = 20;

		if ($isCanvas==0) {
			$iframeInputSize = $urlInputSize;
			$iframeWidth = 380;
			$iframeHeight = 40;
			$inputSizeParam  = '';
		}else{
			$isCanvas = 1;
			$iframeWidth = 150;
			$iframeHeight = 60;
			$iframeInputSize = 3;
			$inputSizeParam = "&inputSize=$iframeInputSize";
		}

		$iframePath = MF_URI."RCCWP_upload.php?input_name=".urlencode($inputName)."&type=$fileType&imageThumbID=img_thumb_$idField&canvas=$isCanvas".$inputSizeParam ;
		?>
			<div id='upload_iframe_<?php echo $idField;?>' class="iframeload { iframe: { id: 'upload_internal_iframe_<?php echo $idField ?>', src: '<?php echo $iframePath;?>', height: <?php echo $iframeHeight ?>, width: <?php echo $iframeWidth ?> } }">
			</div>
			<table border="0">
				<tr >
					<td style="border-bottom-width: 0px; padding: 0"><label for="upload_url"><?php _e('Or URL', $mf_domain); ?>:</label></td>
					<td style="border-bottom-width: 0px; padding-left: 4px;">
						<input id="upload_url_<?php echo $idField;  ?>"
							name="upload_url_<?php echo $inputName ?>"
							type="text"
							size="<?php echo $urlInputSize ?>"
							/>
						<input type="button" onclick="uploadurl('<?php echo $idField  ?>','<?php echo $fileType ?>')" value="Upload" class="button" style="width:70px"/>
					</td>
				</tr>
			</table>
		<?php
	}
}
