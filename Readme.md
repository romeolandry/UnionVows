# 💍 UnionVows: Seamless Wedding Management System

**UnionVows** is a modern, full-stack web application designed to help couples manage their wedding planning journey with ease. Built with **Laravel** and **Vue.js**, it simplifies guest coordination, invitation delivery, and real-time RSVP tracking.

---

## 🚀 Key Features

* **User Accounts:** Secure registration and login for couples to manage their private event details.
* **Event Dashboard:** Centralized hub to manage wedding dates, locations, and schedules.
* **Smart Guest List:** Add guests manually or via bulk import; categorize by family, friends, or VIPs.
* **Multi-Channel Invitations:** * 📧 **Email:** Beautifully branded HTML invitations.
    *** 💬 **WhatsApp:** Direct-to-phone invites using Twilio/Meta API.
* **Automated Notifications:** Reminders for guests who haven't responded yet.
* **One-Click RSVP:** Unique, tokenized links for guests to confirm attendance without needing an account.
* **Live Analytics:** Real-time tracking of "Attending," "Declined," and "Pending" statuses.

---

## 🛠️ Tech Stack

| Layer | Technology |
| :--- | :--- |
| **Backend** | [Laravel 11](https://laravel.com/) |
| **Frontend** | [Vue 3](https://vuejs.org/) (Composition API) |
| **Bridge** | [Inertia.js](https://inertiajs.com/) (The Modern Monolith) |
| **Styling** | [Tailwind CSS](https://tailwindcss.com/) |
| **Database** | MySQL / PostgreSQL |
| **Communication** | Twilio (WhatsApp) & Mailgun/SES (Email) |

---

## 📂 Database Architecture

The system utilizes a relational structure to ensure data integrity:

* **Users Table:** Couples' credentials and profile info.
* **Events Table:** Wedding-specific data (linked to `user_id`).
* **Guests Table:** Name, contact info, and `rsvp_token` (linked to `event_id`).
* **RSVPs Table:** Tracks attendance status, dietary requirements, and plus-ones.

---

## ⚙️ Installation

1. **Clone the repository:**

   ```bash
   git clone [https://github.com/yourusername/unionvows.git](https://github.com/yourusername/unionvows.git)
   cd unionvows# 💍 UnionVows: Seamless Wedding Management System

**UnionVows** is a modern, full-stack web application designed to help couples manage their wedding planning journey with ease. Built with **Laravel** and **Vue.js**, it simplifies guest coordination, invitation delivery, and real-time RSVP tracking.

---

## 🚀 Key Features

* **User Accounts:** Secure registration and login for couples to manage their private event details.
* **Event Dashboard:** Centralized hub to manage wedding dates, locations, and schedules.
* **Smart Guest List:** Add guests manually or via bulk import; categorize by family, friends, or VIPs.
* **Multi-Channel Invitations:** * 📧 **Email:** Beautifully branded HTML invitations.
    *** 💬 **WhatsApp:** Direct-to-phone invites using Twilio/Meta API.
* **Automated Notifications:** Reminders for guests who haven't responded yet.
* **One-Click RSVP:** Unique, tokenized links for guests to confirm attendance without needing an account.
* **Live Analytics:** Real-time tracking of "Attending," "Declined," and "Pending" statuses.

---

## 🛠️ Tech Stack

| Layer | Technology |
| :--- | :--- |
| **Backend** | [Laravel 11](https://laravel.com/) |
| **Frontend** | [Vue 3](https://vuejs.org/) (Composition API) |
| **Bridge** | [Inertia.js](https://inertiajs.com/) (The Modern Monolith) |
| **Styling** | [Tailwind CSS](https://tailwindcss.com/) |
| **Database** | MySQL / PostgreSQL |
| **Communication** | Twilio (WhatsApp) & Mailgun/SES (Email) |

---

## 📂 Database Architecture

The system utilizes a relational structure to ensure data integrity:
* **Users Table:** Couples' credentials and profile info.
* **Events Table:** Wedding-specific data (linked to `user_id`).
* **Guests Table:** Name, contact info, and `rsvp_token` (linked to `event_id`).
* **RSVPs Table:** Tracks attendance status, dietary requirements, and plus-ones.

---

## ⚙️ Installation

1. **Clone the repository:**
   ```bash
   git clone [https://github.com/yourusername/unionvows.git](https://github.com/yourusername/unionvows.git)
   cd unionvows
