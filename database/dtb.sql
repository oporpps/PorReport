CREATE TABLE tb_account (
    t_id INT PRIMARY KEY AUTO_INCREMENT,
    t_email VARCHAR(150) NOT NULL UNIQUE,
    t_password TEXT NOT NULL,
    t_role ENUM('user','admin','tc') DEFAULT 'user',
    t_updatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    t_createdAt TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=INNODB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

CREATE TABLE repair_requests (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,  
    equipment VARCHAR(255) NOT NULL,  -- ชื่ออุปกรณ์
    brand VARCHAR(255) NOT NULL,  -- ยี่ห้อ
    model VARCHAR(255) NOT NULL,  -- รุ่น
    serial_number VARCHAR(255),  -- หมายเลขซีเรียล (ถ้ามี)
    issue TEXT NOT NULL,  -- ปัญหาที่พบเจอ
    possible_cause TEXT,  -- สาเหตุที่อาจเกิดขึ้น (ถ้าทราบ)
    previous_attempts TEXT,  -- รายละเอียดการพยายามซ่อม/แก้ไขปัญหา
    description TEXT,  -- รายละเอียดเพิ่มเติม
    location VARCHAR(255) NOT NULL,  -- สถานที่
    images TEXT,
    status ENUM('pending','progress','finish','cannot') DEFAULT 'pending',
    reason TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,  
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP  
);


CREATE TABLE messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    recipient VARCHAR(255) NOT NULL,
    subject VARCHAR(255) NOT NULL,
    message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
