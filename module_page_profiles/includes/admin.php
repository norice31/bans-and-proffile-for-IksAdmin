<?php if (empty($ASAdmins['sid']) != true) : ?>
	<div class="row">
		<div class="col-md-12 profile_gap">
			<div class="profile_block_titles">
				<div class="profile_block_content_title">
					<svg viewBox="0 0 512 512">
						<path d="M466.5 83.71l-192-80c-4.875-2.031-13.16-3.703-18.44-3.703c-5.312 0-13.55 1.672-18.46 3.703L45.61 83.71C27.7 91.1 16 108.6 16 127.1C16 385.2 205.2 512 255.9 512C307.1 512 496 383.8 496 127.1C496 108.6 484.3 91.1 466.5 83.71zM352 200c0 5.531-1.901 11.09-5.781 15.62l-96 112C243.5 335.5 234.6 335.1 232 335.1c-6.344 0-12.47-2.531-16.97-7.031l-48-48C162.3 276.3 160 270.1 160 263.1c0-12.79 10.3-24 24-24c6.141 0 12.28 2.344 16.97 7.031l29.69 29.69l79.13-92.34c4.759-5.532 11.48-8.362 18.24-8.362C346.4 176 352 192.6 352 200z" />
					</svg>
					<?= $Translate->get_translate_module_phrase('module_page_profiles', '_ADMINISTRATOR_INFORMATION'); ?>
				</div>
			</div>
			<div class="profile_block_content">
				<div class="profile_block_stats">
					<div class="profile_block_scroll scroll">
						<div class="profile_block_info">
							<div class="profile_block_title">
								<svg viewBox="0 0 448 512">
									<path d="M128 0c17.7 0 32 14.3 32 32V64H288V32c0-17.7 14.3-32 32-32s32 14.3 32 32V64h48c26.5 0 48 21.5 48 48v48H0V112C0 85.5 21.5 64 48 64H96V32c0-17.7 14.3-32 32-32zM0 192H448V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V192zm64 80v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm128 0v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H208c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H336zM64 400v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H208zm112 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H336c-8.8 0-16 7.2-16 16z" />
								</svg>
								<?= $Translate->get_translate_module_phrase('module_page_profiles', '_Admin_Access'); ?>
							</div>
							<div class="profile_block_value">
								<?= ($ASAdmins['end'] == 0) ? $Translate->get_translate_phrase('_Forever') : ($ASAdmins['end'] <= time() ? $Translate->get_translate_module_phrase('module_page_profiles', '_Expired') : date('d.m.Y', $ASAdmins['end'])); ?>
							</div>
						</div>
						<div class="profile_block_info">
							<div class="profile_block_title">
								<svg viewBox="0 0 512 512">
									<path d="M269.4 2.9C265.2 1 260.7 0 256 0s-9.2 1-13.4 2.9L54.3 82.8c-22 9.3-38.4 31-38.3 57.2c.5 99.2 41.3 280.7 213.6 363.2c16.7 8 36.1 8 52.8 0C454.7 420.7 495.5 239.2 496 140c.1-26.2-16.3-47.9-38.3-57.2L269.4 2.9zM256 112c8.8 0 16 7.2 16 16c0 33 39.9 49.5 63.2 26.2c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6C334.5 200.1 351 240 384 240c8.8 0 16 7.2 16 16s-7.2 16-16 16c-33 0-49.5 39.9-26.2 63.2c6.2 6.2 6.2 16.4 0 22.6s-16.4 6.2-22.6 0C311.9 334.5 272 351 272 384c0 8.8-7.2 16-16 16s-16-7.2-16-16c0-33-39.9-49.5-63.2-26.2c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6C177.5 311.9 161 272 128 272c-8.8 0-16-7.2-16-16s7.2-16 16-16c33 0 49.5-39.9 26.2-63.2c-6.2-6.2-6.2-16.4 0-22.6s16.4-6.2 22.6 0C200.1 177.5 240 161 240 128c0-8.8 7.2-16 16-16zM232 256c13.3 0 24-10.7 24-24s-10.7-24-24-24s-24 10.7-24 24s10.7 24 24 24zm72 32c0-8.8-7.2-16-16-16s-16 7.2-16 16s7.2 16 16 16s16-7.2 16-16z" />
								</svg>
								<?= $Translate->get_translate_module_phrase('module_page_profiles', '_Admin_Immunity'); ?>
							</div>
							<div class="profile_block_value">
								<?= $ASAdmins['immunity'] ?>
							</div>
						</div>
					</div>
				</div>
				<div class="profile_block_stats">
					<div class="profile_block_scroll scroll">
						<div class="profile_block_info">
							<div class="profile_block_title">
								<svg viewBox="0 0 448 512">
									<path d="M96 32H352V112H96V32zM0 112V96C0 60.65 28.65 32 64 32V112H0zM208 144V240H0V144H208zM0 368V272H64V368H0zM208 400V480H64C28.65 480 0 451.3 0 416V400H208zM448 400V416C448 451.3 419.3 480 384 480H240V400H448zM384 368V272H448V368H384zM96 368V272H352V368H96zM448 144V240H240V144H448zM384 112V32C419.3 32 448 60.65 448 96V112H384z" />
								</svg>
								<?= $Translate->get_translate_module_phrase('module_page_profiles', '_BansGiven'); ?>
							</div>
							<div class="profile_block_value">
								<?= $ASAdmins['bans_count'] ?>
							</div>
						</div>
						<div class="profile_block_info">
							<div class="profile_block_title">
								<svg viewBox="0 0 640 512">
									<path d="M38.8 5.1C28.4-3.1 13.3-1.2 5.1 9.2S-1.2 34.7 9.2 42.9l592 464c10.4 8.2 25.5 6.3 33.7-4.1s6.3-25.5-4.1-33.7L472.1 344.7c15.2-26 23.9-56.3 23.9-88.7V216c0-13.3-10.7-24-24-24s-24 10.7-24 24v40c0 21.2-5.1 41.1-14.2 58.7L416 300.8V96c0-53-43-96-96-96s-96 43-96 96v54.3L38.8 5.1zM344 430.4c20.4-2.8 39.7-9.1 57.3-18.2l-43.1-33.9C346.1 382 333.3 384 320 384c-70.7 0-128-57.3-128-128v-8.7L144.7 210c-.5 1.9-.7 3.9-.7 6v40c0 89.1 66.2 162.7 152 174.4V464H248c-13.3 0-24 10.7-24 24s10.7 24 24 24h72 72c13.3 0 24-10.7 24-24s-10.7-24-24-24H344V430.4z" />
								</svg>
								<?= $Translate->get_translate_module_phrase('module_page_profiles', '_CommsGiven'); ?>
							</div>
							<div class="profile_block_value">
								<?= $ASAdmins['comms_count'] ?>
							</div>
						</div>
						<?php if (!empty($Db->db_data['Admins'])) : ?>
							<div class="profile_block_info">
								<div class="profile_block_title">
									<svg viewBox="0 0 512 512">
										<path d="M313.4 32.9c26 5.2 42.9 30.5 37.7 56.5l-2.3 11.4c-5.3 26.7-15.1 52.1-28.8 75.2H464c26.5 0 48 21.5 48 48c0 25.3-19.5 46-44.3 47.9c7.7 8.5 12.3 19.8 12.3 32.1c0 23.4-16.8 42.9-38.9 47.1c4.4 7.2 6.9 15.8 6.9 24.9c0 21.3-13.9 39.4-33.1 45.6c.7 3.3 1.1 6.8 1.1 10.4c0 26.5-21.5 48-48 48H294.5c-19 0-37.5-5.6-53.3-16.1l-38.5-25.7C176 420.4 160 390.4 160 358.3V320 272 247.1c0-29.2 13.3-56.7 36-75l7.4-5.9c26.5-21.2 44.6-51 51.2-84.2l2.3-11.4c5.2-26 30.5-42.9 56.5-37.7zM32 192H96c17.7 0 32 14.3 32 32V448c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32V224c0-17.7 14.3-32 32-32z" />
									</svg>
									<?= $Translate->get_translate_module_phrase('module_page_profiles', '_PlayerLikes'); ?>
								</div>
								<div class="profile_block_value">
									<?php empty($Admins['like_count']) ? print 0 : print $Admins['like_count'] . $Translate->get_translate_module_phrase('module_page_profiles', '_pcs');?>
								</div>
							</div>
							<div class="profile_block_info">
								<div class="profile_block_title">
									<svg viewBox="0 0 512 512">
										<path d="M313.4 479.1c26-5.2 42.9-30.5 37.7-56.5l-2.3-11.4c-5.3-26.7-15.1-52.1-28.8-75.2H464c26.5 0 48-21.5 48-48c0-25.3-19.5-46-44.3-47.9c7.7-8.5 12.3-19.8 12.3-32.1c0-23.4-16.8-42.9-38.9-47.1c4.4-7.3 6.9-15.8 6.9-24.9c0-21.3-13.9-39.4-33.1-45.6c.7-3.3 1.1-6.8 1.1-10.4c0-26.5-21.5-48-48-48H294.5c-19 0-37.5 5.6-53.3 16.1L202.7 73.8C176 91.6 160 121.6 160 153.7V192v48 24.9c0 29.2 13.3 56.7 36 75l7.4 5.9c26.5 21.2 44.6 51 51.2 84.2l2.3 11.4c5.2 26 30.5 42.9 56.5 37.7zM32 320H96c17.7 0 32-14.3 32-32V64c0-17.7-14.3-32-32-32H32C14.3 32 0 46.3 0 64V288c0 17.7 14.3 32 32 32z" />
									</svg>
									<?= $Translate->get_translate_module_phrase('module_page_profiles', '_PlayerDislikes'); ?>
								</div>
								<div class="profile_block_value">
									<?php empty($Admins['dislike_count']) ? print 0 : print $Admins['dislike_count'] . $Translate->get_translate_module_phrase('module_page_profiles', '_pcs');?>
								</div>
							</div>
						<?php endif; ?>
					</div>
				</div>
				<!-- <div class="profile_block_stats">
					<div class="profile_block_no_scroll">
						<div class="profile_block_info">
							<div class="profile_block_title">
								<svg viewBox="0 0 512 512">
									<path d="M256 32c14.2 0 27.3 7.5 34.5 19.8l216 368c7.3 12.4 7.3 27.7 .2 40.1S486.3 480 472 480H40c-14.3 0-27.6-7.7-34.7-20.1s-7-27.8 .2-40.1l216-368C228.7 39.5 241.8 32 256 32zm0 128c-13.3 0-24 10.7-24 24V296c0 13.3 10.7 24 24 24s24-10.7 24-24V184c0-13.3-10.7-24-24-24zm32 224c0-17.7-14.3-32-32-32s-32 14.3-32 32s14.3 32 32 32s32-14.3 32-32z" />
								</svg>
								<?= $Translate->get_translate_module_phrase('module_page_profiles', '_Admin_Warns'); ?>
							</div>
							<div class="profile_block_value">
								<?= $SBAdmins['comms_warn'] ?> / 3
							</div>
						</div>
					</div>
					<div class="profile_block_title_map">
						<svg viewBox="0 0 512 512">
							<path d="M384 232C397.3 232 408 242.7 408 256C408 269.3 397.3 280 384 280H128C114.7 280 104 269.3 104 256C104 242.7 114.7 232 128 232H384zM384 328C397.3 328 408 338.7 408 352C408 365.3 397.3 376 384 376H128C114.7 376 104 365.3 104 352C104 338.7 114.7 328 128 328H384zM448 32C483.3 32 512 60.65 512 96V416C512 451.3 483.3 480 448 480H64C28.65 480 0 451.3 0 416V96C0 60.65 28.65 32 64 32H448zM448 192H64V416H448V192zM436.7 96H363.3C356.2 96 352.6 104.6 357.7 109.7L394.3 146.3C397.5 149.5 402.5 149.5 405.7 146.3L442.3 109.7C447.4 104.6 443.8 96 436.7 96V96z" />
						</svg>
						<div><?= $Translate->get_translate_module_phrase('module_page_profiles', '_Warns_List'); ?></div>
					</div>
					<div class="profile_block_maps_matches">
						<?php for ($i = 0, $c_c = min(sizeof($SBWarns), 3); $i < $c_c; $i++) { ?>
							<div class="profile_block_warns mb10">
								<div class="profile_block_title">
									<svg viewBox="0 0 512 512">
										<path d="M256 512C114.6 512 0 397.4 0 256S114.6 0 256 0S512 114.6 512 256s-114.6 256-256 256zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z" />
									</svg>
									До <?= date("d.m.Y", $SBWarns[$i]['expires']) ?>
								</div>
								<div class="profile_text_warn">
									<?= $SBWarns[$i]['reason'] ?>
								</div>
							</div>
						<?php } ?>
					</div>
				</div> -->
			</div>
		</div>
	</div>
<?php endif; ?>