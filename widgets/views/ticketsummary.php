<div class="panel">
	<div class="row data-row">
		<div class="large-1 column">
			<div class="data-label">Priority:</div>
		</div>
		<div class="large-1 column left">
			<div class="data-value" style="color: <?= $ticket->priority->colour?>">
				<?= $ticket->priority->name ?>
			</div>
		</div>
		<div class="large-1 column left">
			<div class="data-label">Current:</div>
		</div>
		<div class="large-4 column left">
			<div class="data-value"><?= $ticket->current_queue->name  . " (" . Helper::convertDate2NHS($ticket->current_queue_assignment->assignment_date) . ")" ?></div>
		</div>
	</div>
	<?php if ($ticket->report) {?>
		<div class="row data-row">
			<div class="large-1 column">
				<div class="data-label">Info:</div>
			</div>
			<div class="large-4 column left">
				<div class="data-value"><?= $ticket->report; ?></div>
			</div>
		</div>
	<?php
	}
	if ($ticket->current_queue_assignment->notes) {?>
	<div class="row data-row">
		<div class="large-1 column">
			<div class="data-label">Notes:</div>
		</div>
		<div class="large-6 column left">
			<div class="data-value"><?= Yii::app()->format->Ntext($ticket->current_queue_assignment->notes) ?></div>
		</div>
	</div>
	<?php
	}
	if ($ticket->hasHistory()) {?>
		<hr />
		<?php foreach ($ticket->getPastQueueAssignments() as $old_ass)  {?>
			<div class="row data-row" style="font-style: italic;">
				<div class="large-2 column">
					<div class="data-label"><?= $old_ass->queue->name ?>:</div>
				</div>
				<div class="large-2 column left">
					<div clas="data-value"><?= Helper::convertDate2NHS($old_ass->assignment_date)?></div>
				</div>

			<?php if ($old_ass->notes) { ?>
			<div class="large-6 column left">
				<div class="data-value"><?= Yii::app()->format->Ntext($old_ass->notes) ?></div>
			</div>
			<?php } ?>
			</div>
		<?php }
	}?>

</div>
