UPDATE user_annotation SET
  name = CONCAT('USER_', CEIL(RAND() * 100)),
  annotation_id = CEIL(RAND() * 100),
  create_datetime = ADDTIME(CONCAT_WS(' ','2014-01-01' + INTERVAL RAND() * 180 DAY, '00:00:00'), SEC_TO_TIME(FLOOR(0 + (RAND() * 86401))));
